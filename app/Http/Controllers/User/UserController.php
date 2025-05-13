<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('User.dashboard');
    }
    public function appointments()
    {
        $appointments = Booking::query()
            ->where('status', 'completed')
            ->where('user_id', Auth::id())
            ->with(['service', 'user.image', 'barber'])
            ->get();

        return view('User.appointments', [
            'appointments' => $appointments,
        ]);
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
        $categories = Category::query()
            ->whereHas('services')
            ->with(['services.images'])
            ->get();
        return view('User.service', [
            'categories' => $categories,
        ]);
    }
    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        return view('User.profile', [
            'user' => $user,
            'image' => $image,
        ]);
    }

}
