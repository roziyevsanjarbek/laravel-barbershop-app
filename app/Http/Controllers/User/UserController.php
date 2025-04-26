<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('User.dashboard');
    }
    public function appointments()
    {
        return view('User.appointments');
    }
    public function bookings()
    {
        return view('User.bookings');
    }
    public function rewards()
    {
        return view('User.rewards');
    }

    public function services()
    {
        return view('User.service');
    }
    public function profile()
    {
        return view('User.profile');
    }

}
