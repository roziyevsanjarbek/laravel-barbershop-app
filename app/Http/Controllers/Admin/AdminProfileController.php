<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function updateProfile(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|',
        ]);

        $user = auth()->user();
        $image = Image::where('user_id', $user->id)->first();

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
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = auth()->user();


        $imageFile = $request->file('profile_picture');

        $path = $imageFile->store('profile_pictures', 'public');

        Image::create([
            'user_id' => $userId,
            'path' => $path,
            'name' => $imageFile->getClientOriginalName(),
        ]);
        return redirect()->route('admin.my-profile')->with('success', 'Profile picture uploaded successfully.');
    }

    public function removeImage(int $userId)
    {
        $image = Image::where('user_id', $userId)->first();
        if ($image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
            return redirect()->route('admin.my-profile')->with('success', 'Profile picture removed successfully.');
        }
        return redirect()->route('admin.my-profile')->with('error', 'Profile picture not found.');


    }


}
