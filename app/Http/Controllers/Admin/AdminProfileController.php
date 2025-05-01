<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        return view('Barber.my-profile', [
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function update(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;

        $user->name = $validator['name'];
        $user->email = $validator['email'];
        $user->phone = $validator['phone'];
        $user->save();

        return view('Barber.my-profile', [
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function uploadImage(Request $request, $userId)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $user = User::findOrFail($userId);

        $imageFile = $request->file('profile_picture');
        $path = $imageFile->store('profile_pictures', 'public');

        if ($user->image) {
            Storage::disk('public')->delete($user->image->path);
            $user->image()->delete();
        }

        $user->image()->create([
            'path' => $path,
            'name' => $imageFile->getClientOriginalName(),
        ]);

        return redirect()->route('admin.my-profile')->with('success', 'Profile picture uploaded successfully.');
    }


    public function delete(int $userId)
    {
        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;
        if ($image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
            return redirect()->route('admin.my-profile')->with('success', 'Profile picture removed successfully.');
        }
        return redirect()->route('admin.my-profile')->with('error', 'Profile picture not found.');


    }


}
