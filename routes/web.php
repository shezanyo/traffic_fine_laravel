<?php

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

