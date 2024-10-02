@extends('layouts.default')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top of other elements */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
        }

        /* Modal Content Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 30%; /* Width of modal */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Close button for modal */
        .close {
            display: inline-block;
            padding: 5px 10px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close:hover {
            background-color: darkred;
        }

        /* Button to trigger modal */
        .pay-button {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pay-button:hover {
            background-color: #218838;
        }

        /* Show modal when the target is active */
        :target {
            display: block; /* This makes the modal visible */
        }

        /* Adjustments to the overall layout to avoid breaking it */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
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
            <p>No fines found for this user.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Fine ID</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Actions</th>
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
                        <td>
                            <!-- Pay button opens the modal -->
                            <a href="#modal{{ $fine->fineid }}" class="pay-button">Pay</a>

                            <!-- The modal itself -->
                            <div id="modal{{ $fine->fineid }}" class="modal">
                                <div class="modal-content">
                                    <h3>Pay Fine</h3>
                                    <p>Are you sure you want to pay this fine?</p>
                                    <p>Fine Amount: {{ $fine->amount }}</p>

                                    <!-- Pay form -->
                                    <form action="{{ route('payFine', ['id' => $fine->fineid]) }}" method="POST">
                                        @csrf
                                        <button type="submit">Confirm Payment</button>
                                    </form>

                                    <!-- Close modal link -->
                                    <a href="#" class="close">Close</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
