@extends('layouts.default')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection
@section('content')
    <!--section 1: Carousel start -->
    <section class="lighter-gradient-background">
        <div class="">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner container mx-auto">
                    <!-- 1st slide -->
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- 1st column -->
                            <div class="col-12 col-lg-6 col-md-12 marginBottomSpace wow slideInLeft"  >
                                <h3>Fine Ease  <span class="textRed">Drive Safe</span> </h3>
                                <br>
                                <h1>Pay Smart, Manage Traffic Fines with Ease </h1>

                            </div>
                            <!-- 2nd column -->
                            <div class="col-12 col-lg-6 col-md-12 wow slideInRight" >
                                <img src="images/slidesCar/car1.jpg" class="d-block w-100" alt="Slide 1">
                            </div>
                        </div>
                    </div>
                    <!-- previous button -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev" >
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <!-- next button -->
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next" >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
    </section>
    <!-- Carousel end -->
@endsection
