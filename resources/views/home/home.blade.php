@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection
@section('content')
    <!-- banner -->
    <section class="container mx-auto mt-5">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-12">
                <div class="mt-5">
                    <h2>Fine Ease</h2>
                    <h2>Drive Safe, Pay Smart,</h2>
                    <h2>Manage Traffic Fines with Ease</h2>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-12">
                <img src="{{asset('images/banner.png')}}" style="width: 80%" alt="" />
            </div>
        </div>
    </section>
    <!-- banner end -->

    <section class="bg-light mt-4 mb-4">
        <div class="container mx-auto mt-5">
            <!-- Traffic Violation Awareness Section -->
            <section class="text-center py-5">
                <h2 class="mb-4">Know the Rules, Avoid the Fines</h2>
                <p class="mb-4">
                    Stay informed about traffic laws and drive responsibly.
                </p>
                <div class="row g-4">
                    <!-- Speeding -->
                    <div class="col-md-4 h-100">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <img
                                    src="{{asset('images/speed.png')}}"
                                    alt="Speeding"
                                    class="mb-3"
                                    style="width: 100px"
                                />
                                <h5 class="card-title">Speeding</h5>
                                <p class="card-text">
                                    Learn about speed limits and avoid hefty penalties.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Drunk Driving -->
                    <div class="col-md-4 h-100">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <img
                                    src="{{asset('images/drunk.png')}}"
                                    alt="Drunk Driving"
                                    class="mb-3"
                                    style="width: 100px"
                                />
                                <h5 class="card-title">Drunk Driving</h5>
                                <p class="card-text">
                                    Understand the consequences of driving.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Running Red Lights -->
                    <div class="col-md-4 h-100">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <img
                                    src="{{asset('images/light.png')}}"
                                    alt="Running Red Lights"
                                    class="mb-3"
                                    style="width: 100px"
                                />
                                <h5 class="card-title">Running Red Lights</h5>
                                <p class="card-text">
                                    Know the importance of obeying traffic signals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- Carousel end -->
@endsection
