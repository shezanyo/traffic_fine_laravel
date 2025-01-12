<?php

use App\Http\Controllers\FineController;
use App\Http\Controllers\PoliceAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;

Route::middleware("auth")->group(function(){
    Route::get("/",[DashController::class,"dashboard"])
    ->name("dashboard");

});

Route::get('/home', function () {
    return view('home.home');
})->name("home");

Route::get("/login",[AuthController::class,"login"])
    ->name("login");

Route::post("/login",[AuthController::class,"loginPost"])
    ->name("login.Post");

Route::get("/register",[AuthController::class,"register"])
    ->name("register");

Route::post("/register",[AuthController::class,"registerPost"])
    ->name("register.Post");

Route::post("/logout", [AuthController::class,"logout"])
    ->name("logout");

Route::post("/pay-fine/{id}", [FineController::class, "payFine"])
    ->name("payFine");

Route::get("/profile", [PoliceAuthController::class, "showProfile"])
    ->name("profile")->middleware("auth");

Route::get('/police/login', [PoliceAuthController::class, 'login'])->name('police.login');

// Handle Police Login Request
Route::post('/police/login', [PoliceAuthController::class, 'loginPost'])
    ->name('police.login.submit');

Route::get('/police/register',[PoliceAuthController::class, 'register'])
    ->name('police.register');

Route::post('/police/register',[PoliceAuthController::class, 'registerPost'])
    ->name('police.registerPost');

Route::middleware('auth:police')->group(function () {
    Route::get('/police/dashboard', function () {
        return view('police.dashboard.dashboard');
    })->name('police.dashboard');
});
