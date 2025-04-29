<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;
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
            'serviceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
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

    public function deleteService(int $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->delete();

        return redirect()->route('admin.manage-services');
    }

    public function updateService(int $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $categories = Category::all();
        return view('Barber.services.edit-service', [
            'user' => $user,
            'image' => $image,
            'categories' => $categories,
            'service' => $service,
        ]);
    }

    public function editService(Request $request){
        dd($request->all());
    }


}
