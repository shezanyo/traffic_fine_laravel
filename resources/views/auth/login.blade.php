@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registerLogin.css') }}" />
@endsection

@section('content')
    <!-- login form section -->
    <br><br>
    <section class="container mx-auto mt-5 wow pulse" style="margin-bottom: 100px;">
        <div class="divWhite formWidth p-4" style="border-radius: 20px;">
            <h4 class="text-center">Login to Your Account</h4>
            <br>
            <!-- Login form -->
            <form action="{{ route('login.Post') }}" method="post">
                @csrf
                <!-- Email -->
                <div class="form-floating mb-3">
                    <input
                        type="email"
                        class="form-control border-2"
                        id="emailInput"
                        placeholder="name@example.com"
                        name="email"
                        value="{{ old('email') }}"
                        aria-label="Email Address"
                    >
                    <label for="emailInput">Email Address*</label>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control border-2"
                        id="passwordInput"
                        placeholder="Password"
                        name="password"
                        aria-label="Password"
                    >
                    <label for="passwordInput">Password*</label>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- General Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Submit Button -->
                <div class="d-grid gap-1">
                    <button class="btn btn-primary" type="submit">
                        <span><i class="fa-solid fa-right-to-bracket"></i> Login</span>
                    </button>
                    <br>
                    <p>New here? <a href="{{ route('register') }}" style="text-decoration: none;">Register here</a></p>
                </div>
            </form>
            <!-- Login form end -->
        </div>
    </section>

    <!-- login form section end -->
@endsection
