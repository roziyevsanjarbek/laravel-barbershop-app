<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        return view('Barber.dashboard', [
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function services()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $services = Service::with('images')->get();
        $categories = Category::query()->whereHas('services')->get();
        return view('Barber.services.edit-services', [
            'user' => $user,
            'image' => $image,
            'services' => $services,
            'categories' => $categories,
        ]);
    }

    public function addService()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $categories = Category::all();
        return view('Barber.services.add-services', [
            'user' => $user,
            'image' => $image,
            'categories' => $categories,
        ]);
    }
    public function clients()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        return view('Barber.clients', [
            'user' => $user,
            'image' => $image
        ]);
    }
    public function myProfile()
    {
       $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        return view('Barber.my-profile', [
            'user' => $user,
            'image' => $image,
        ]);
    }
    public function manageServices()
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
    public function editService(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $service = Service::findOrFail($request->id);
        $categories = Category::all();
        return view('Barber.services.edit-service', [
            'user' => $user,
            'image' => $image,
            'service' => $service,
            'categories' => $categories,
        ]);
    }
}
