<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard()
    {
        return view('user-dashboard.dashboard');
    }

    public function appointments()
    {
        return view('user-dashboard.appointments');
    }

    public function rewards(){
        return view('user-dashboard.rewards');
    }
    public function bookings(){
        return view('user-dashboard.booking');
    }
    public function services()
    {
        return view('user-dashboard.services');
    }
}
