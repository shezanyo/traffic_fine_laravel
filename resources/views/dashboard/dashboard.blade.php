@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="container">
        <!-- Fine Counter Section -->
        <div class="fine-counter">
            <p>Fine</p>
            <h1>TK {{ $totalAmount }}</h1>
        </div>

        <div class="content">
            <!-- Button to Add Driving License -->
            <button class="license-btn">+ Driving License</button>

            <!-- Fine History Section -->
            <section class="fine-history">
                <h2>Fine History</h2>
                @forelse ($fines as $fine)
                    <a href="{{ route('fine.Payment',['fine_id' => $fine->fineid]) }}" class="history-item">
                        <h3>{{ $fine->name }}</h3>
                        <p>{{ $fine->location }}</p>
                        <p>{{ $fine->description }}</p>
                        <span>{{ \Carbon\Carbon::parse($fine->date)->format('d/m/y') }}</span>
                        <span class="amount">TK {{ $fine->amount }}</span>
                    </a>
                @empty
                    <p>No fines available.</p>
                @endforelse
            </section>


            <!-- Traffic Alerts Section -->
            <aside class="traffic-alerts">
                <h2>Traffic Alerts</h2>
                <ul>
                    <li>Badda road blocked</li>
                    <li>Karwanbazar road 5km traffic</li>
                    <li>Abul Hotel road 2km traffic</li>
                </ul>
            </aside>
        </div>
    </div>

@endsection
