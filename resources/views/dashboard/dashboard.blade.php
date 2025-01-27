@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="dashboard-container">
        <!-- Fine and License Section -->

            <div class="fine-counter">
                <p>Fine</p>
                <h1>TK {{ $totalAmount }}</h1>
            </div>

            <div class="content">
                <!-- Button to Add Driving License -->
                <button class="license-btn">+ Driving License</button>
            </div>


        <!-- Fine History Section -->
        <section class="fine-history">
            <h2>Fine List</h2>
            @forelse ($fines as $fine)
                <div style="background: white; margin-bottom: 10px; padding: 10px; border-radius: 15px;">
                    <a href="{{ route('fine.Payment', ['fine_id' => $fine->fineid]) }}" class="history-item" style="text-decoration: none; color: inherit;">
                        <div class="row">
                            <div class="col-5">
                                <div>
                                    <h3>{{ $fine->name }}</h3>
                                    <p>{{ $fine->location }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <p>{{ $fine->description }}</p>
                            </div>
                            <div class="col-2">
                                <span>{{ \Carbon\Carbon::parse($fine->date)->format('d/m/y') }}</span>
                            </div>
                            <div class="col-2">
                                <span class="amount">TK {{ $fine->amount }}</span>
                            </div>
                        </div>
                    </a>
                </div>
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
@endsection
