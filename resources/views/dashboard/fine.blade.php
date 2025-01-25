@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection
@section('content')
<div class="dashboard-container">
    <section class="fine-history">
    <h2>Fine History</h2>
    @forelse ($fines as $fine)
        <div style="background: white; margin-bottom: 10px; padding: 10px; border-radius: 15px;">
            <div  class="history-item" style="text-decoration: none; color: inherit;">
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
            </div>
        </div>
    @empty
        <p>No fines available.</p>
    @endforelse
    </section>
</div>
@endsection
