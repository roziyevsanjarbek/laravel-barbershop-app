<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');;


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/appointments', [UserController::class, 'appointments'])->name('appointments');
    Route::get('/dashboard/rewards', [UserController::class, 'rewards'])->name('rewards');
    Route::get('/dashboard/bookings', [UserController::class, 'bookings'])->name('bookings');
    Route::get('/dashboard/services', [UserController::class, 'services'])->name('services');


    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/show-services',[AdminController::class, 'showServices'])->name('admin.show-services');
    Route::get('/admin/dashboard/add-services', [AdminController::class, 'addServices'])->name('admin.add-services');
    Route::get('/admin/dashboard/customers', [AdminController::class, 'customers'])->name('admin.customers');
});







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
