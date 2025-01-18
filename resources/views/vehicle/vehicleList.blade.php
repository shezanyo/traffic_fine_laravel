@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vehicle.css') }}" />
@endsection

@section('content')
    <div class="floating-button left-button" href="{{route('vehicleAdd.Get')}}">Button 1</div>
    <div class="floating-button right-button">Button 2</div>
    <h2>My Vehicles</h2>

    @if($vehicles && $vehicles->isEmpty())
        <p>You have no registered vehicles.</p>
    @else
        <div class="vehicle-list">
            @foreach ($vehicles as $vehicle)
                <div class="vehicle-card">
                    <div class="vehicle-info">
                        <strong>Car Model:</strong> {{ $vehicle->vehicle_model }}
                        <span class="vehicle-color">Color: {{ $vehicle->vehicle_color }}</span>
                    </div>
                    <p><strong>Car Company:</strong> {{ $vehicle->vehicle_type }}</p>
                </div>
            @endforeach
        </div>
    @endif

@endsection
