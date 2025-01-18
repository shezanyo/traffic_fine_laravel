@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vehicle.css') }}" />
@endsection

@section('content')
    <form action="{{ route('vehicle.Post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="vehicle_model">Vehicle Model:</label>
            <input type="text" id="vehicle_model" name="vehicle_model" required>
        </div>

        <div class="form-group">
            <label for="vehicle_type">Vehicle Type:</label>
            <input type="text" id="vehicle_type" name="vehicle_type" required>
        </div>

        <div class="form-group">
            <label for="vehicle_color">Vehicle Color:</label>
            <input type="text" id="vehicle_color" name="vehicle_color" required>
        </div>

        <div class="form-group">
            <label for="registration_number">Registration Number:</label>
            <input type="text" id="registration_number" name="registration_number" required>
        </div>

        <button type="submit" class="submit-button">Add Vehicle</button>
    </form>

@endsection
