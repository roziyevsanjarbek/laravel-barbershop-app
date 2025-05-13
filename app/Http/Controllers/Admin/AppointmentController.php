<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = User::query()->findOrFail(Auth::id());
        $image = $user->image;

        $bookings = Booking::query()->with(['service', 'user.image','barber'])->get();
        return view('Barber.schedule', [
            'user' => $user,
            'image' => $image,
            'bookings' => $bookings,
        ]);

    }

    public function edit(int $bookingId)
    {
        $booking = Booking::query()->findOrFail($bookingId);

        $user = User::query()->findOrFail(Auth::id());
        $image = $user->image;
        $bookings = Booking::query()->with(['service', 'user.image','barber'])->get();

        return view('Barber.edit-schedule', [
            'user' => $user,
            'image' => $image,
            'bookings' => $bookings,
            'booking' => $booking,
        ]);
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|string|max:255',
        ]);


        Booking::query()->update([
            'date' => $validator['date'],
            'time' => $validator['time'],
            'status' => $validator['status'],
        ]);

        return redirect()->route('admin.schedule')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(int $bookingId)
    {
        $booking = Booking::query()->findOrFail($bookingId);
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Appointment deleted successfully.');
    }
}
