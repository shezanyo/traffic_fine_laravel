<!-- resources/views/profile.blade.php -->

@extends('layouts.default')

@section('title', 'Profile')

@section('content')
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
                <td>{{ $user->phone }}</td> <!-- Assuming you have a phone column in the users table -->
            </tr>
            <tr>
                <th>Username:</th>
                <td>{{ $user->username }}</td> <!-- Assuming username is a unique attribute -->
            </tr>
            <tr>
                <th>Joined:</th>
                <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
        </table>

        <!-- Optionally, you can add buttons like "Edit Profile" or "Change Password" -->
{{--        <a href="{{ route('editProfile') }}" class="btn btn-primary">Edit Profile</a>--}}
{{--        <a href="{{ route('changePassword') }}" class="btn btn-secondary">Change Password</a>--}}
    </div>
@endsection
