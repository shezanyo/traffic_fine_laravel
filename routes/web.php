<?php

use App\Http\Controllers\FineController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;

Route::middleware("auth")->group(function(){
    Route::get("/",[DashController::class,'dashboard'])
    ->name("dashboard");

});


Route::get('/login',[AuthController::class,'login'])
    ->name('login');

Route::post('/login',[AuthController::class,'loginPost'])
    ->name('login.Post');

Route::get('/register',[AuthController::class,'register'])
    ->name('register');

Route::post('/register',[AuthController::class,'registerPost'])
    ->name('register.Post');

Route::post('/logout', [AuthController::class,'logout'])
    ->name('logout');

Route::post('/pay-fine/{id}', [FineController::class, 'payFine'])
    ->name('payFine');

Route::get('/profile', [ProfileController::class, 'showProfile'])
    ->name('profile')->middleware('auth');
