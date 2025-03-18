<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');

Route::middleware('auth')->group(function () 
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order/{deviceId}', [OrderController::class, 'orderForm'])
    ->middleware (['auth'])
    ->name('orders.form');
    Route::post('/order/{deviceId}', [OrderController::class, 'processOrder'])
    ->middleware (['auth'])
    ->name('orders.process');
});

require __DIR__.'/auth.php';
