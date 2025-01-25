@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/finePayment.css') }}" />
@endsection

@section('content')
    <section>
        <div class="fine-item">
            <h3>{{ $fine->name }}</h3>
            <p>Amount: TK {{ $fine->amount }}</p>
            <p>Status: {{ $fine->status ? 'Paid' : 'Unpaid' }}</p>

            @if (!$fine->status)
                <form action="{{route('pay.Fine',['fine_id' => $fine->fineid])}}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Pay</button>
                </form>
            @else
                <button class="btn btn-secondary" disabled>Already Paid</button>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </section>

@endsection
