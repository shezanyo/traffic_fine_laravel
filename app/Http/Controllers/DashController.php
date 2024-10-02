<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function dashboard()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Check if user is authenticated
        if ($userId) {
            // Fetch all fines related to the logged-in user
            $fines = Fine::where('user_id', $userId)->get();

            $totalAmount = Fine::where('user_id', $userId)->sum('amount');

            // Pass the fines data to the dashboard view
            return view('dashboard', compact('fines','totalAmount'));
        } else {
            return redirect(route('login'))->with('error', 'Session expired. Please login again.');
        }
    }
}
