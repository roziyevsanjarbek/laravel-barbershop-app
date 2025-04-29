<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;

class AddServiceController extends Controller
{
    public function addService(Request $request)
    {
        $validated = $request->validate([
            'serviceName' => 'required|string|max:255',
            'servicePrice' => 'required|numeric|min:0',
            'serviceDuration' => 'required|integer|min:1',
            'serviceDescription' => 'required|string|max:1000',
            'serviceCategory' => 'required|exists:categories,id',
            'serviceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('serviceImage')) {
            $imageFile = $request->file('serviceImage');
            $imagePath = $imageFile->store('services', 'public'); // Rasmni saqlash
        }


        $service = Service::create([
            'name' => $validated['serviceName'],
            'price' => $validated['servicePrice'],
            'duration' => $validated['serviceDuration'],
            'description' => $validated['serviceDescription'],
            'category_id' => $validated['serviceCategory'],
        ]);

        if ($imagePath) {
            $image = new Image();
            $image->path = $imagePath;
            $image->name = $imageFile->getClientOriginalName();
            $service->images()->save($image);
        }

        return redirect()->route('admin.manage-services');
    }


}
