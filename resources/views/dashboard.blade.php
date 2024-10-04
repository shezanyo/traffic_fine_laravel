@extends("layouts.default")

@section("title", "Dashboard")

@push("styles")
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #0044cc;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between; /* Aligns the left and right elements */
            align-items: center;
        }

        /* Left-aligned Navbar Items (Dashboard) */
        .navbar-left a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar-left a:hover {
            background-color: #003399;
        }

        /* Right-aligned Navbar Items (Profile and Dropdown) */
        .navbar-right {
            position: relative;
        }

        /* Profile Button Styling */
        .dropbtn {
            background-color: #0044cc;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        .dropbtn:hover {
            background-color: #003399;
        }

        /* Dropdown Content (Hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        /* Logout Button inside Dropdown */
        .dropdown-content form {
            margin: 0;
            padding: 0;
        }

        .logout-btn {
            width: 100%;
            padding: 12px 16px;
            background-color: #fff;
            border: none;
            cursor: pointer;
            color: #333;
            text-align: left;
        }

        .logout-btn:hover {
            background-color: #ffcccc;
            color: #333;
        }

        /* Show Dropdown on Hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Money Display */
        .money-display h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Fine Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Pay Button Styling */
        .pay-button {
            color: #0044cc;
            text-decoration: underline;
            cursor: pointer;
        }

        .pay-button:hover {
            color: #002a80;
        }

        /* Modal (Floating Pay Panel) */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content {
            text-align: center;
        }

        .modal-content h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .modal-content p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        /* Modal Close Button */
        .modal .close, .modal .cancel {
            display: block;
            margin-top: 10px;
            text-decoration: underline;
            cursor: pointer;
            color: #ff4444;
        }

        .modal .close:hover, .modal .cancel:hover {
            color: #cc0000;
        }

        /* Confirm Payment Button */
        .modal-content button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .modal-content button:hover {
            background-color: #218838;
        }

        /* Modal Button Group */
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -55%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-left a,
            .dropbtn {
                margin-bottom: 10px;
            }

            .dropdown-content {
                right: auto;
                left: 0;
            }
        }

    </style>
@endpush

@section("content")
    <!-- Navbar -->
    <nav class="navbar">
        <!-- Left-aligned links -->
        <div class="navbar-left">
            <a href="{{ route("dashboard") }}">Dashboard</a>
        </div>

        <!-- Right-aligned Profile and Dropdown -->
        <div class="navbar-right">
            <div class="dropdown">
                <button class="dropbtn">Profile</button>
                <div class="dropdown-content">
                    <form action="{{ route("profile") }}">
                        <button type="submit" class="logout-btn">Profile</button>
                    </form>
                    <form action="{{ route("logout") }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
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
                                    <p>Fine Amount: ${{ $fine->amount }}</p>

                                    <!-- Button group for Pay/Cancel -->
                                    <div class="modal-buttons">
                                        <!-- Pay form -->
                                        <form action="{{ route("payFine", ["id" => $fine->fineid]) }}" method="POST">
                                            @csrf
                                            <button type="submit">Confirm Payment</button>
                                        </form>

                                        <!-- Cancel button -->
                                        <a href="#" class="cancel">Cancel</a>
                                    </div>

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
    <script>
        // Open modal on clicking "Pay"
        document.querySelectorAll(".pay-button").forEach(button => {
            button.addEventListener("click", function (e) {
                e.preventDefault();
                const modalId = this.getAttribute("href").substring(1);
                document.getElementById(modalId).style.display = "block";
            });
        });

        // Close modal on clicking "Close" or "Cancel"
        document.querySelectorAll(".close, .cancel").forEach(link => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                this.closest(".modal").style.display = "none";
            });
        });
    </script>
@endsection
