@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registerLogin.css') }}" />
@endsection

@section('content')

    <section class="container mx-auto mt-5 wow pulse" style="margin-bottom: 100px;">
        <div class="divWhite formWidth p-4" style="border-radius: 20px;">
            <h4 class="text-center">Police Register</h4>
            <form action="{{ route('police.registerPost') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control border-2" type="text" id="namer" name="name" aria-label="name" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control border-2" type="text" id="batchnumber" name="batchnumber" aria-label="Batch Number" required>
                    <label for="batchnumber">Batch Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control border-2" type="text" id="area_of_work" name="area_of_work" aria-label="Area of work" required>
                    <label for="area_of_work">Area of Work</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control border-2" type="password" id="password" name="password" aria-label="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control border-2" type="password" id="password_confirmation" name="password_confirmation" aria-label="Confirm Password" required>
                    <label for="password_confirmation">Password Confirm</label>
                </div>
                <div class="d-grid gap-1">
                    <button class="btn" type="submit">
                        <span><i class="fa-solid fa-right-to-bracket"></i> Login</span>
                    </button>
                    <br>
                    <p>New here? <a href="{{ route('police.login') }}" style="text-decoration: none; color:#97AFAF;">Register here</a></p>
                </div>
            </form>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
