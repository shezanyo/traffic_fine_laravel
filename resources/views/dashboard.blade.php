@extends('layouts.default')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
        }

        .navbar a, .navbar form {
            display: inline-block;
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .money-display {
            text-align: center;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
@endpush

@section('content')
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>

        <!-- Logout Button (inside form) -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;color:#333;text-decoration:underline;cursor:pointer;">
                Logout
            </button>
        </form>
    </nav>

    <div class="container">
        <!-- Money Display -->
        <div class="money-display">
            <h2>Total Amount: ${{$totalAmount}}</h2>
        </div>

        <!-- Fine Table -->
        <h3>Fines</h3>
        @if($fines->isEmpty())
            <p>You have no fines.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Fine ID</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fines as $fine)
                    <tr>
                        <td>{{ $fine->fineid }}</td>
                        <td>{{ $fine->date }}</td>
                        <td>{{ $fine->location }}</td>
                        <td>{{ $fine->description }}</td>
                        <td>{{ $fine->amount }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
