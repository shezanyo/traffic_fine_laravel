<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Fine;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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

    public function payFine($id)
    {
        // Find the fine by ID and delete it
        $fine = Fine::findOrFail($id);
        $fine->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('police.dashboard')->with('success', 'Fine paid successfully.');
    }
}
