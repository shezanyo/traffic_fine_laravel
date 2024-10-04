@extends("layouts.default")

@section("title", "Profile")

@push("styles")
    <style>
        /* General Body Styling */
        body {
            background-color: #f9f9f9;
            font-family: "Arial", sans-serif;
        }

        /* Container Styling */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header Styling */
        h2 {
            text-align: center;
            color: #0044cc;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
        }

        td {
            color: #555;
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #0044cc;
        }

        .btn-primary:hover {
            background-color: #003399;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endpush

@section("content")
    <div class="container">
        <h2>User Profile</h2>

        <table>
            <tr>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>{{ $user->phoneNumber }}</td> <!-- Assuming you have a phone column in the users table -->
            </tr>
            <tr>
                <th>Joined:</th>
                <td>{{ $user->created_at->format("d M Y") }}</td>
            </tr>
        </table>

        <!-- Optionally, you can add buttons like "Edit Profile" or "Change Password" -->
        <div style="text-align: center;">
            <a href="" class="btn btn-primary">Edit Profile</a>
            <a href="" class="btn btn-secondary">Change Password</a>
        </div>
    </div>
@endsection
