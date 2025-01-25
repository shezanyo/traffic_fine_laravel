<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        if ($userId) {
            // Fetch the car IDs (vehicle IDs) for the authenticated user
            $carIds = Vehicle::where('user_id', $userId)->pluck('id');

            // Fetch fines with status = 0 associated with the retrieved car IDs
            $fines = Fine::whereIn('vehicle_id', $carIds)
                ->where('status', 0)
                ->get();

            // Calculate the total amount of fines with status = 0
            $totalAmount = $fines->sum('amount');

            return view('dashboard.dashboard', compact('fines', 'totalAmount'));
        } else {
            return view('home.home', ['showNavbarInHeader' => false]);
        }
    }

}
