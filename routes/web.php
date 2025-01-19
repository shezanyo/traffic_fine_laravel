<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\PoliceAuthController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/home', function () {
    return view('home.home', ['showNavbarInHeader' => false]);
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.Post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.Post');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [PoliceAuthController::class, 'showProfile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/pay-fine/{id}', [FineController::class, 'payFine'])->name('payFine');

    Route::get('/vehicle',[VehicleController::class,'vehicleGet'])->name('vehicle.Get');
    Route::get('/vehicle/add',[VehicleController::class,'vehicleAddGet'])->name('vehicleAdd.Get');
    Route::post('/vehicles', [VehicleController::class, 'vehicleCreate'])->name('vehicle.Post');

    Route::get('/fine-payment/{fine_id}', [FineController::class, 'finePayment'])->name('fine.Payment');
    Route::post('/pay-fine/{fine_id}', [FineController::class, 'payFine'])->name('pay.Fine');



});

// Police Routes (Authentication and Dashboard)
Route::prefix('police')->group(function () {
    // Public Police Routes
    Route::get('/login', [PoliceAuthController::class, 'login'])->name('police.login');
    Route::post('/login', [PoliceAuthController::class, 'loginPost'])->name('police.login.submit');

    Route::get('/register', [PoliceAuthController::class, 'register'])->name('police.register');
    Route::post('/register', [PoliceAuthController::class, 'registerPost'])->name('police.registerPost');

    // Authenticated Police Routes
    Route::middleware('auth:police')->group(function () {
        Route::get('/dashboard', function () {
            return view('police.dashboard.dashboard');
        })->name('police.dashboard');

        Route::post('/fines', [FineController::class, 'store'])->name('fines.store');
    });
});
