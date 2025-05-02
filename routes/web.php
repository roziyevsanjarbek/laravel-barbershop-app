<?php

use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
        Route::get('/clients', [AdminController::class, 'clients'])->name('admin.clients');


        Route::get('/my-profile', [AdminProfileController::class, 'index'])->name('admin.my-profile');
        Route::post('/my-profile/update', [AdminProfileController::class, 'update'])->name('admin.update-profile');
        Route::post('/my-profile/{user_id}/upload-image', [AdminProfileController::class, 'uploadImage'])->name('admin.upload-image');
        Route::delete('/my-profile/{user_id}/remove-image', [AdminProfileController::class, 'delete'])->name('admin.remove-image');


        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
        Route::get('/add-service', [ServiceController::class, 'show'])->name('admin.add-service');;
        Route::get('/services/update/{serviceId}', [ServiceController::class, 'edit'])->name('admin.update-services');
        Route::get('manage-services', [ServiceController::class, 'manage'])->name('admin.manage-services');
        Route::post('/services/store', [ServiceController::class, 'store'])->name('admin.add-services');
        Route::post('/services/update/{serviceId}', [ServiceController::class, 'update'])->name('admin.update-service');
        Route::post('/services/delete/{serviceId}', [ServiceController::class, 'delete'])->name('admin.delete-services');


        Route::get('/barbers', [BarberController::class, 'index'])->name('admin.barbers');
        Route::post('/barbers/add', [BarberController::class, 'store'])->name('admin.add-barber');
        Route::post('/barbers/update/{barberId}', [BarberController::class, 'update'])->name('admin.update-barber');
        Route::post('/barbers/delete/{barberId}', [BarberController::class, 'destroy'])->name('admin.delete-barber');
    });
});





Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
