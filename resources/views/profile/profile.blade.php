@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registerLogin.css') }}" />
@endsection

@section('content')
    <!-- User profile section -->
    <br><br>
    <section class="container mx-auto mt-5 wow pulse">
        <div class="divWhite formWidth p-4" style="border-radius: 20px;">
            <h4 class="text-center" >User Profile</h4>
            <br>
            <!-- Profile details -->
            <form class="row g-3">
                <!-- Name -->
                <div class="col-12">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" value="{{ $user->name }}" readonly>
                </div>

                <!-- Email -->
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="inputEmail" value="{{ $user->email }}" readonly>
                </div>

                <!-- Phone -->
                <div class="col-12">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" value="{{ $user->phoneNumber ?? 'Not Provided' }}" readonly>
                </div>
            </form>
        </div>
    </section>
@endsection
