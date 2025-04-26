<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();
        return view('Barber.dashboard', [
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function services()
    {
        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();
        return view('Barber.services', [
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function addService()
    {
        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();
        return view('Barber.add-services', [
            'user' => $user,
            'image' => $image,
        ]);
    }
    public function clients()
    {
        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();
        return view('Barber.clients', [
            'user' => $user,
            'image' => $image,
        ]);
    }
    public function myProfile()
    {
        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();
        return view('Barber.my-profile', [
            'user' => $user,
            'image' => $image,
        ]);
    }
}
