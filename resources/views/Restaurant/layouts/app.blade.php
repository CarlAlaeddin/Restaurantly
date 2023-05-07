<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Restaurant Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('Restaurant/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('Restaurant/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Restaurant/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Restaurant/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Restaurant/assets/css/style.css') }}" rel="stylesheet">
    {{-- added css yield resource and internal --}}
    @yield('css-resource')
    <style>
        @yield('css-internal')
    </style>
<!-- =======================================================
  * Template Name: Restaurantly
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
{{-- include header partial --}}
@include('Restaurant.partials.header')
{{-- if show index page added hero section --}}
@if(\Illuminate\Support\Facades\Route::getCurrentRoute()->uri === '/')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>Restaurantly</span></h1>
                    <h2>Delivering great food for more than 18 years!</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                        <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->
@endif

<main id="main">

    @yield('content')

</main><!-- End #main -->
{{-- include footer partial --}}
@include('Restaurant.partials.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('Restaurant/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('Restaurant/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Restaurant/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('Restaurant/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('Restaurant/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('Restaurant/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('Restaurant/assets/js/main.js') }}"></script>
{{-- added js resources and internal code --}}
<script>
    @yield('js-internal')
</script>
@yield('js-resource')
</body>

</html>
