<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
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
        return view('Barber.services', [
            'user' => $user,
            'image' => $image
        ]);
    }

    public function addService()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $categories = Category::all();
        return view('Barber.add-services', [
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
        return view('Barber.manage-service', [
            'user' => $user,
            'image' => $image,
        ]);
    }
}
