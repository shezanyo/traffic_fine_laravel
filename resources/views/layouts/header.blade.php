<section>
    <div class="container mx-auto">
        @if(!isset($showNavbarInHeader) || $showNavbarInHeader)
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div>
                        <img src="{{ asset('images/logo.png') }}" style="width: 120px;" alt="">
                    </div>
                    <!-- collapse responsive button -->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- menus -->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav mx-auto">
                            <a class="nav-link active nav-link-ltr" href="{{Route("dashboard")}}"
                            >Home</a>
                            <a class="nav-link active nav-link-ltr" href="{{Route("login")}}"
                            >Shop</a>
                            <a class="nav-link active nav-link-ltr" href="{{Route("register")}}"
                            >Add Car</a>
                            <a class="nav-link active nav-link-ltr" href="{{Route("dashboard")}}"
                            >feat</a>
                        </div>
                        <div class="">
                            <a class="nav-link active nav-link-ltr" href="{{Route("profile")}}"
                            >Profile</a>

                        </div>
                    </div>
                </div>
            </nav>
        @else
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div>
                        <img src="{{ asset('images/logo.png') }}" style="width: 120px;" alt="">
                    </div>
                    <!-- collapse responsive button -->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- menus -->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <!-- Push login and register buttons to the right -->
                        <div class="ms-auto">
                            <a class="nav-link active nav-link-ltr" href="{{Route('register')}}">Register</a>
                            <a class="nav-link active nav-link-ltr mx-3" href="{{Route('login')}}">Login</a>
                        </div>
                    </div>
                </div>
            </nav>

        @endif
    </div>
</section>
