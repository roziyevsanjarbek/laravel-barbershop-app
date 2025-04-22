<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin-dashboard.dashboard');
    }


    public function customers()
    {
        return view('admin-dashboard.customers');
    }
    public function addServices()
    {
        return view('admin-dashboard.add_service');
    }
    public function showServices(){
        return view('admin-dashboard.services');
    }
}
