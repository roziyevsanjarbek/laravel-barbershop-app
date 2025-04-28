<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|',
        ]);


        $image = Image::were('user_id', auth()->user()->id)->first();
        $user = auth()->user();
        $user->name = $validator['fullName'];
        $user->email = $validator['email'];
        $user->phone = $validator['phone'];
        $user->save();

        return view('User.profile', [
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

        // Rasmni saqlash
        $path = $imageFile->store('profile_pictures', 'public');

        // Images jadvaliga yozish
        Image::create([
            'user_id' => $userId,
            'path' => $path,
            'name' => $imageFile->getClientOriginalName(),
        ]);

        return redirect()->route('user.profile')->with('success', 'Profile picture uploaded successfully.');
    }

    public function removeImage(int $userId)
    {
        $image = Image::where('user_id', $userId)->first();
        if ($image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();

            return redirect()->route('user.profile')->with('success', 'Profile picture removed successfully.');
        }
        return redirect()->route('user.profile')->with('error', 'Profile picture not found.');


    }
}
