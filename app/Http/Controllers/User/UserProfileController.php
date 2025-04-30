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



        $user = User::findOrFail(auth()->user()->id);
        $image = $user->image;

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

        $user = User::findOrFail($userId);

        $imageFile = $request->file('profile_picture');

        $path = $imageFile->store('profile_pictures', 'public');

        $image = new Image([
            'path' => $path,
            'name' => $imageFile->getClientOriginalName(),
        ]);

        $user->image()->save($image);

        return redirect()->route('user.profile')->with('success', 'Profile picture uploaded successfully.');
    }


    public function removeImage(int $userId)
    {
        $user = User::findOrFail($userId);
        $image = $user->image;
        if ($image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();

            return redirect()->route('user.profile')->with('success', 'Profile picture removed successfully.');
        }
        return redirect()->route('user.profile')->with('error', 'Profile picture not found.');


    }
}
