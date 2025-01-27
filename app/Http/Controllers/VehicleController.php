<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicleGet()
    {
        $vehicles = auth()->user()->vehicles;
        return view('vehicle.vehicleList',compact('vehicles'));
    }
    public function vehicleAddGet()
    {
        return view('vehicle.vehicleAdd');
    }
    public function vehicleCreate(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'vehicle_model' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_color' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:vehicles|max:255',
        ]);

        // Attach the authenticated user's ID
        $validatedData['user_id'] = auth()->id();

        // Create a new vehicle record
        $vehicle = Vehicle::create($validatedData);

        // Return success response
        return redirect()->route("vehicleAdd.Get");
    }

}

