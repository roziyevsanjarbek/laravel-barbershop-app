<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Barber.dashboard');
    }

    public function services()
    {
        return view('Barber.services');
    }

    public function addService()
    {
        return view('Barber.add-services');
    }
    public function clients()
    {
        return view('Barber.clients');
    }
    public function myProfile()
    {
        return view('Barber.my-profile');
    }
}
