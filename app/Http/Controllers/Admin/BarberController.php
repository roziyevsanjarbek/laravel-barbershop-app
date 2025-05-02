<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        $barbers = Barber::with('images')->get();
        return view('Barber.barbers', [
            'user' => $user,
            'image' => $image,
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
    public function store(Request $request)
    {

        $validator = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'barberType' => 'required|string|max:255',
            'barberImage' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ]);

        $imagePath = null;
        $imageName = null;

        if ($request->hasFile('barberImage')) {
            $imageFile = $request->file('barberImage');
            $imageName = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
        }

        $destinationPath = public_path('barbers');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $imageFile->move($destinationPath, $imageName);

        $imagePath = 'barbers/' . $imageName;



        $barber = Barber::create([
            'first_name' => $validator['firstName'],
            'last_name' => $validator['lastName'],
            'email' => $validator['email'],
            'phone' => $validator['phone'],
            'address' => $validator['address'],
            'birthday' => $validator['birthday'],
            'barber_type' => $validator['barberType'],
        ]);


        if($imagePath){
            $image = new Image();
            $image->path = $imagePath;
            $image->name = $imageName;
            $barber->images()->save($image);
        }

        return redirect()->route('admin.barbers')->with('success', 'Barber created successfully.');
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
        $validator = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'barberType' => 'required|string|max:255',
        ]);

        $barber = Barber::query()->update([
            'first_name' => $validator['firstName'],
            'last_name' => $validator['lastName'],
            'email' => $validator['email'],
            'phone' => $validator['phone'],
            'address' => $validator['address'],
            'birthday' => $validator['birthday'],
            'barber_type' => $validator['barberType'],
        ]);

        return redirect()->route('admin.barbers')->with('success', 'Barber updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barber = Barber::findOrFail($id);
        
        if ($barber->images) {
            $imagePath = public_path($barber->images->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $barber->images->delete();
        }


        $barber->delete();

        return redirect()->route('admin.barbers')->with('success', 'Barber deleted successfully.');
    }

}
