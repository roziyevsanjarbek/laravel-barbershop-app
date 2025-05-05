<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $services = Service::with('images')->get();
        $categories = Category::query()
            ->whereHas('services')
            ->with(['services.images'])
            ->get();
        return view('Barber.services.services', [
            'user' => $user,
            'image' => $image,
            'services' => $services,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'serviceName' => 'required|string|max:255',
            'servicePrice' => 'required|numeric|min:0',
            'serviceDuration' => 'required|integer|min:1',
            'serviceDescription' => 'required|string',
            'serviceCategory' => 'required|exists:categories,id',
            'isBooking' => 'required|boolean|in:0,1',
            'serviceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;
        $imageName = null;

        if ($request->hasFile('serviceImage')) {
            $imageFile = $request->file('serviceImage');
            $imageName = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

            $destinationPath = public_path('services');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageFile->move($destinationPath, $imageName);

            $imagePath = 'services/' . $imageName;
        }

        $validated['isBooking'] = (int) $validated['isBooking'];

        $service = Service::create([
            'name' => $validated['serviceName'],
            'price' => $validated['servicePrice'],
            'duration' => $validated['serviceDuration'],
            'description' => $validated['serviceDescription'],
            'category_id' => $validated['serviceCategory'],
            'is_booking' => $validated['isBooking'],
        ]);

        if ($imagePath) {
            $image = new Image();
            $image->path = $imagePath;
            $image->name = $imageName;
            $service->image()->save($image);
        }

        return redirect()->route('admin.manage-services')->with('success', 'Service created successfully.');
    }


    public function edit(int $serviceId)
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

    public function show()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $service = Service::with('images')->get();
        $categories = Category::all();
        return view('Barber.services.add-services', [
            'user' => $user,
            'image' => $image,
            'categories' => $categories,
            'service' => $service,
        ]);
    }

    public function update(Request $request, $serviceId)
    {
        $validated = $request->validate([
            'serviceName' => 'required|string|max:255',
            'servicePrice' => 'required|numeric|min:0',
            'serviceDuration' => 'required|integer|min:1',
            'serviceDescription' => 'required|string|max:1000',
            'serviceCategory' => 'required|exists:categories,id',
            'serviceImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $service = Service::findOrFail($serviceId);

        $service->update([
            'name' => $validated['serviceName'],
            'price' => $validated['servicePrice'],
            'duration' => $validated['serviceDuration'],
            'description' => $validated['serviceDescription'],
            'category_id' => $validated['serviceCategory'],
        ]);

        if ($request->hasFile('serviceImage')) {
            $image = $request->file('serviceImage');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('services');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // papka mavjud bo‘lmasa, yaratamiz
            }

            $image->move($destinationPath, $imageName);

            if ($service->image) {
                $oldImagePath = public_path($service->image->path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $service->image->delete();
            }

            $service->image()->create([
                'path' => 'services/' . $imageName,
                'name' => $imageName,
            ]);
        }

        return redirect()->route('admin.manage-services')->with('success', 'Service updated successfully.');
    }

    public function manage()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $services = Service::with('images')->get();
        return view('Barber.services.manage-service', [
            'user' => $user,
            'image' => $image,
            'services' => $services,
            'images' => $image,
        ]);
    }

    public function delete(int $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->delete();

        return redirect()->route('admin.manage-services');
    }


}
