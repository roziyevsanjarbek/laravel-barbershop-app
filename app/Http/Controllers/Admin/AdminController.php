<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $bookings = Booking::query()
            ->with(['service', 'user.image', 'barber'])
            ->whereDate('date', now()->toDateString())
            ->get();
        $bookingItems = Booking::query()
            ->with(['service', 'user.image', 'barber'])
            ->whereDate('date', now()->toDateString())
            ->count();
        return view('Barber.dashboard', [
            'user' => $user,
            'image' => $image,
            'bookings' => $bookings,
            'bookingItems' => $bookingItems,
        ]);
    }

    public function services()
    {

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
}
