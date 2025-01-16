<?php

namespace App\Http\Controllers;

use App\Models\Police;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PoliceAuthController extends Controller
{
    public function login(){
        return view('police.auth.login');
    }
    public function register(){
        return view('police.auth.register');
    }
    public function loginPost(Request $request){
        $request->validate([
            'batchnumber'=>'required',
            'password'=>'required',
        ]);
        $credentials=$request->only("batchnumber","password");
        if (Auth::guard('police')->attempt([
            'batchnumber' => $credentials['batchnumber'],
            'password' => $credentials['password'],
        ])) {
            // Regenerate the session after successful login
            $request->session()->regenerate();

            // Redirect to the intended dashboard with a success message
            return redirect()->intended(route('police.dashboard'))
                ->with('success', 'Logged in successfully.');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'batchnumber' => 'The provided credentials do not match our records.',
        ])->onlyInput('batchnumber');
    }

    public function registerPost(Request $request)
    {
        // Validate the registration form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'batchnumber' => [
                'required',
                'string',
                'max:255',
                'unique:polices,batchnumber', // Ensure unique batch numbers
            ],
            'area_of_work' => 'required|string|max:255',
            'password' => 'required|string', // Requires password confirmation
        ]);
        // Create the police record
        $police = Police::create([
            'name' => $validatedData['name'],
            'batchnumber' => $validatedData['batchnumber'],
            'area_of_work' => $validatedData['area_of_work'],
            'password' => Hash::make($validatedData['password']), // Hash the password
        ]);


        // Redirect to dashboard or desired page
        return redirect()->route('police.login')
            ->with('success', 'Registration successful. Welcome!');
    }

}
