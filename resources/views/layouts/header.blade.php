<section>
    <div class="container mx-auto">
        @if(!isset($showNavbarInHeader) || $showNavbarInHeader)
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <div>
                        <img src="{{ asset('images/logo.png') }}" style="width: 120px;" alt="Logo">
                    </div>
                    <!-- Collapse responsive button -->
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
                    <!-- Menus -->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <!-- Centered menu items -->
                        <div class="navbar-nav mx-auto">
                            <a class="nav-link active nav-link-ltr" href="{{ Route('dashboard') }}">Home</a>
                            <a class="nav-link active nav-link-ltr" href="{{ Route('login') }}">Shop</a>
                            <a class="nav-link active nav-link-ltr" href="{{ Route('register') }}">Add Car</a>
                            <a class="nav-link active nav-link-ltr" href="{{ Route('dashboard') }}">Feat</a>
                        </div>
                        <!-- User Profile -->
                        <div class="dropdown">
                            <a
                                href="#"
                                class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                id="dropdownUserMenu"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <!-- User image -->
                                <img
                                    src="{{ asset('images/user.png') }}"
                                    alt="User"
                                    class="rounded-circle"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUserMenu">
                                <li><a class="dropdown-item" href="{{ Route('profile') }}">View Profile</a></li>
                                <li><a class="dropdown-item" href="{{Route('vehicle.Get')}}">Vehicles</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ Route('logout') }}">Logout</a></li>
                            </ul>
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
