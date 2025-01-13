<?php

namespace App\Http\Controllers;

use App\Models\Fine;
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
            'status' => 'required|boolean',
            'driver_id' => 'required|exists:drivers,id',
            'police_id' => 'required|exists:police,id',
            'vehicle_id' => 'required|exists:vehicle,id',
        ]);

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
