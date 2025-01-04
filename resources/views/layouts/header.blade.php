<!-- navbar start -->
<section>
    <div class="container mx-auto">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div>
                    <img src="{{ asset('images/logo.png') }}" style="width: 70px;" alt="">
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
                        <a class="nav-link active nav-link-ltr" href="index.html"
                        >Home </a>
                        <a class="nav-link active nav-link-ltr" href="profile.html"
                        >Profile</a>
                        <a class="nav-link active nav-link-ltr" href="history.html"
                        >History</a>
                        <a class="nav-link active nav-link-ltr" href="fine.html"
                        >Fine</a>
                    </div>
                    <!-- login register button -->
                    <div class="">
                        <a class="nav-link active nav-link-ltr" href="register.html"
                        >Register</a>
                        <a class="nav-link active nav-link-ltr mx-3" href="login.html"
                        >Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
<!-- navbar end -->
