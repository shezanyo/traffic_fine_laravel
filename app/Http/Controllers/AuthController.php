<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login',['showNavbarInHeader' => false]);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("dashboard"))
                ->with("success", "Welcome back!");
        }

        return redirect(route("login"))
            ->withInput($request->only("email")) // Retain email input
            ->with("error", "Invalid email or password. Please try again.");
    }


    public function register()
    {
        return view('auth.register',['showNavbarInHeader' => false]);
    }



    public function registerPost(Request $request)
    {
        // Validate incoming request
        $request->validate([
            "name" => "required|string|max:255",
            "email" => [
                "required",
                "email",
                "regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/", // Only Gmail addresses
                "unique:users,email",
            ],
            "phoneNumber" => [
                "required",
                "regex:/^(\+8801|01)[3-9]\d{8}$/", // Valid BD numbers: +880 or 01 prefix
                "unique:users,phoneNumber",
            ],
            "password" => "required|min:8|confirmed", // Password confirmation
        ], [
            // Custom error messages
            'email.regex' => 'Only Gmail addresses are allowed.',
            'phoneNumber.regex' => 'Enter a valid Bangladeshi phone number.',
            'email.unique' => 'This email is already registered.',
            'phoneNumber.unique' => 'This phone number is already registered.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = Hash::make($request->password);

        // Save the user and handle response
        if ($user->save()) {
            return redirect()->route("login")
                ->with("success", "User created successfully. Please log in.");
        } else {
            return redirect()->route("register")
                ->with("error", "Registration failed. Please try again.");
        }
    }

    public function logout()
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect(route('login'));
    }
    public function showProfile()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Pass user data to the profile view
        return view('profile.profile', compact('user'));
    }
}
