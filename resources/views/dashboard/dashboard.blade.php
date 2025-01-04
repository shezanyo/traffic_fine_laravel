@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="fine-counter">
        <p>Fine</p>
        <h1>TK 8000</h1>
    </div>
    <div class="content">
        <button class="license-btn">+ Driving License</button>
        <section class="fine-history">
            <h2>Fine History</h2>
            <div class="history-item">
                <h3>Overspeeding</h3>
                <p>Basaboo</p>
                <p>Speeding over 130 km/h</p>
                <span>12/12/24</span>
                <span class="amount">TK 6000</span>
            </div>
            <div class="history-item">
                <h3>Helmet</h3>
                <p>Gulshan</p>
                <p>Rider no helmet</p>
                <span>03/12/24</span>
                <span class="amount">TK 2000</span>
            </div>
        </section>
        <aside class="traffic-alerts">
            <h2>Traffic Alerts</h2>
            <ul>
                <li>Badda road blocked</li>
                <li>Karwanbazar road 5km traffic</li>
                <li>Abul Hotel road 2km traffic</li>
            </ul>
        </aside>
    </div>

@endsection
