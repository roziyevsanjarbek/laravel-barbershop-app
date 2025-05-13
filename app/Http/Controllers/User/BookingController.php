<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Barber;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('images')->get();
        $barbers = Barber::with('images')->get();

        return view('User.bookings', [
            'services' => $services,
            'barbers' => $barbers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $userId = Auth::check() ? Auth::id() : null;
        $booking = Booking::create([
            'user_id' => $userId,
            'service_id' => $request->service_id,
            'barber_id' => $request->barber_id,
            'date' => $request->date,
            'time' => $request->time,
            'first_name' => $request->customer['first_name'],
            'last_name' => $request->customer['last_name'],
            'email' => $request->customer['email'],
            'phone' => $request->customer['phone'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully',
            'data' => $booking
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
