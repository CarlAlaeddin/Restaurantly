<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
            <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
        </div>

        <div class="languages d-none d-md-flex align-items-center">
            <ul>
                <li>En</li>
                <li><a href="#">De</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0">
            <a href="{{ route('index') }}">
                Restaurantly
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ asset('Restaurant/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->uri === '/')
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
                <li><a class="nav-link scrollto" href="#events">Events</a></li>
                <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
                <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                @endif
                <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endguest
                        @auth
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li><a href="{{ route('profile.index') }}">Profile</a></li>
                        @endauth
                    </ul>
                </li>
                @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->uri === '/')
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        @if(url()->current() === '/')
            <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>
        @endif
    </div>
</header><!-- End Header -->
