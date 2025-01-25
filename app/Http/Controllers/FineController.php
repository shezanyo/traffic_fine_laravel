<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Fine;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FineController extends Controller
{
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'registration_number' => 'required|string|exists:vehicles,registration_number',
            'license_number' => 'required|string|exists:drivers,license_number',
        ]);

        // Fetch vehicle_id from registration number
        $vehicle = Vehicle::where('registration_number', $validatedData['registration_number'])->firstOrFail();
        $validatedData['vehicle_id'] = $vehicle->id;

        // Fetch driver_id from license number
        $driver = Driver::where('license_number', $validatedData['license_number'])->firstOrFail();
        $validatedData['driver_id'] = $driver->id;

        // Get police_id from authenticated user
        $validatedData['police_id'] = auth()->id();

        // Set the status to 'unpaid' (false)
        $validatedData['status'] = false;

        // Remove keys not needed for the fines table
        unset($validatedData['registration_number'], $validatedData['license_number']);

        // Create a new fine record
        Fine::create($validatedData);

        // Redirect to the dashboard with a success message
        return redirect()->route('police.dashboard')->with('success', 'Fine added successfully!');
    }

    public function finePayment($fine_id)
    {
        $fine = Fine::where('fineid', $fine_id)->first();
        return view('dashboard.finePayment',compact('fine'));
    }
    public function payFine($fine_id)
    {
        // Find the fine by its ID
        $fine = Fine::where('fineid', $fine_id)->first();

        if ($fine) {
            // Update the fine status to '1' (paid)
            $fine->status = 1;
            $fine->save();

            // Redirect with a success message
            return redirect()->route('fine.Payment',['fine_id' => $fine->fineid])->with('success', 'Fine marked as paid successfully!');
        } else {
            // Redirect with an error message if the fine is not found
            return redirect()->route('fine.Payment',['fine_id' => $fine->fineid])->with('error', 'Fine not found.');
        }
    }

    public function currentFine()
    {
        $userId = Auth::id();

        // Fetch the car IDs (vehicle IDs) for the authenticated user
        $carIds = Vehicle::where('user_id', $userId)->pluck('id');

        // Fetch fines with status = 0 associated with the retrieved car IDs
        $fines = Fine::whereIn('vehicle_id', $carIds)
            ->where('status', 0)
            ->get();

        // If no fines are found, redirect back to the same page with a message
        if ($fines->isEmpty()) {
            return redirect()->back()->with('info', 'No fines available.');
        }

        // Pass the fines to the view
        return view('dashboard.fine', compact('fines'));
    }


    public function finehistory(){
        $userId = Auth::id();

        // Fetch the car IDs (vehicle IDs) for the authenticated user
        $carIds = Vehicle::where('user_id', $userId)->pluck('id');

        // Fetch fines with status = 0 associated with the retrieved car IDs
        $fines = Fine::whereIn('vehicle_id', $carIds)
            ->where('status', 1)
            ->get();

        // If no fines are found, redirect back to the same page with a message
        if ($fines->isEmpty()) {
            return redirect()->back()->with('info', 'No fines available.');
        }

        // Pass the fines to the view
        return view('dashboard.fineHistory', compact('fines'));
    }
}
