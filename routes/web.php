<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);



Route::middleware(['auth','role:user'])->group(function (){
    Route::prefix('user')->group(function (){
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('/services', [UserController::class, 'services'])->name('user.services');
        Route::get('/appointments', [UserController::class, 'appointments'])->name('user.appointments');
        Route::get('/rewards', [UserController::class, 'rewards'])->name('user.rewards');
        Route::get('/bookings', [UserController::class, 'bookings'])->name('user.bookings');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

        Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.update-profile');
        Route::post('/profile/{user_id}/upload-image', [UserProfileController::class, 'uploadImage'])->name('user.upload-image');
        Route::delete('/profile/{user_id}/remove-image', [UserProfileController::class, 'removeImage'])->name('user.remove-image');
    });
});

Route::middleware(['auth','role:admin'])->group(function (){
    Route::prefix('barber')->group(function (){
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::get('/add-service', [AdminController::class, 'addService'])->name('admin.add-service');;
        Route::get('/clients', [AdminController::class, 'clients'])->name('admin.clients');;
        Route::get('/my-profile', [AdminController::class, 'myProfile'])->name('admin.my-profile');

        Route::post('/my-profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.update-profile');
        Route::post('/my-profile/{user_id}/upload-image', [AdminProfileController::class, 'uploadImage'])->name('admin.upload-image');
        Route::delete('/my-profile/{user_id}/remove-image', [AdminProfileController::class, 'removeImage'])->name('admin.remove-image');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
