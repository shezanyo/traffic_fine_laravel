@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registerLogin.css') }}" />
@endsection

@section('content')
    <!-- register form section -->
    <br><br>
    <section class="container mx-auto mt-5 wow pulse">
        <div class="divWhite formWidth p-4" style="border-radius: 20px;">
            <h4 class="text-center">Register your account</h4>
            <br>
            <form action="{{ route('register.Post') }}" method="post">
                @csrf
                <!-- Email -->
                <div class="form-floating mb-3">
                    <input
                        type="email"
                        class="form-control border-2"
                        id="emailInput"
                        placeholder="name@gmail.com"
                        name="email"
                        value="{{ old('email') }}"
                    >
                    <label for="emailInput">Email Address (Gmail only)*</label>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Name -->
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control border-2"
                        id="nameInput"
                        placeholder="Your Name"
                        name="name"
                        value="{{ old('name') }}"
                    >
                    <label for="nameInput">Name*</label>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Phone Number -->
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control border-2"
                        id="phoneInput"
                        placeholder="+8801xxxxxxxx"
                        name="phoneNumber"
                        value="{{ old('phoneNumber') }}"
                    >
                    <label for="phoneInput">Phone Number (Bangladesh)*</label>
                    @error('phoneNumber')
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
                    >
                    <label for="passwordInput">Password*</label>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Confirm Password -->
                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control border-2"
                        id="confirmPasswordInput"
                        placeholder="Confirm Password"
                        name="password_confirmation"
                    >
                    <label for="confirmPasswordInput">Confirm Password*</label>
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Submit Button -->
                <div class="d-grid gap-1">
                    <button class="btn btn-primary" type="submit">
                        <span><i class="fa-solid fa-right-to-bracket"></i> Register</span>
                    </button>
                    <br>
                    <p>Already have an account?
                        <a href="{{ route('login') }}" style="text-decoration: none;">Login here</a>
                    </p>
                </div>
            </form>
        </div>
    </section>

@endsection
