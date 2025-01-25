@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vehicle.css') }}" />
@endsection

@section('content')
    <div class="form-container">
        <div class="floating-buttons">
            <a href="{{ route('vehicleAdd.Get') }}" class="btn btn-primary">Add Vehicle</a>
            <button class="btn btn-secondary">Button 2</button>
        </div>
        <h2 class="text-center mt-4">My Vehicles</h2>

        @if($vehicles && $vehicles->isEmpty())
            <p>You have no registered vehicles.</p>
        @else
            <div class="vehicle-list">
                @foreach($vehicles as $vehicle)
                    <div class="vehicle-card">
                        <div class="vehicle-info">
                            <strong>Car Model: </strong>{{ $vehicle->vehicle_model }}
                            <span class="vehicle-color">Color: {{ $vehicle->vehicle_color }}</span>
                        </div>
                        <div class="vehicle-info">
                            <strong>Car Company: </strong>{{ $vehicle->vehicle_type }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
