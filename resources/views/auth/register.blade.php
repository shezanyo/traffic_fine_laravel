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
            <h4 class="text-center" >Register your account</h4>
            <br>
            <form action="{{ route("register.Post") }}" method="post">
                <!-- email -->
                <div class="form-floating mb-3 ">
                    <input type="email" class="form-control border-2" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email Address*</label>
                </div>
                <!-- name -->
                <div class="form-floating mb-3 ">
                    <input type="text" class="form-control border-2" id="floatingInput" placeholder="name@example.com" name="name">
                    <label for="floatingInput">Name*</label>
                </div>
                <!-- phone number -->
                <div class="form-floating mb-3 ">
                    <input type="text" class="form-control border-2" id="floatingInput" placeholder="+01xxxxxxxx" name="PhoneNumber">
                    <label for="floatingInput">Name*</label>
                </div>
                <!-- password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control border-2" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password*</label>
                </div>
{{--                <!-- confirm password -->--}}
{{--                <div class="form-floating mb-4">--}}
{{--                    <input type="password" class="form-control border-2" id="floatingPassword" placeholder="Password">--}}
{{--                    <label for="floatingPassword">Confirm Password*</label>--}}
{{--                </div>--}}

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Submit button -->

                <div class="d-grid gap-1">
                    <button class="btn btn-primary" type="submit">
                        <span> <i class="fa-solid fa-right-to-bracket"></i> Register </span>
                    </button>
                    <br>
                    <p>Already have an account? <a href="{{route("login")}}" style="text-decoration: none;" >Login here</a> </p>
                </div>

            </form>
        </div>
    </section>
@endsection
