 <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="utf-8">
                    <meta content="width=device-width, initial-scale=1.0" name="viewport">

                    <title>{{__('title.home')}}</title>
                    <meta content="" name="description">
                    <meta content="" name="keywords">

                    <!-- Favicons -->
                    <link href="assets/img/favicon.png" rel="icon">
                    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

                    <!-- Google Fonts -->
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

                    <!-- Vendor CSS Files -->
                    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
                    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
                    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

                    <!-- Template Main CSS File -->
                    <link href="assets/css/style.css" rel="stylesheet">

                    <!-- =======================================================
                    * Template Name: Mentor - v4.7.0
                    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
                    * Author: BootstrapMade.com
                    * License: https://bootstrapmade.com/license/
                    ======================================================== -->
                </head>

                <body>

                <!-- ======= Header ======= -->
                <header id="header" class="fixed-top">
                    <div class="container d-flex align-items-center">

                        <h1 class="logo me-auto"><a href=""></a></h1>
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                        <nav id="navbar" class="navbar order-last order-lg-0">
                            <ul>

                                <li>
                                    <a href="{{ url('/home') }}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ url('/news') }}">news</a>
                                </li>
                                @if (Route::has('login'))
                                    @auth


                                        <li >


                                            <a  href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>


                                    @else
                                  <li><a href="{{ route('login') }}">{{ __('messages.login')}}</a></li>




                                    @endauth
                                @endif




                            </ul>

                        </nav><!-- .navbar -->



                    </div>
                </header><!-- End Header -->

                <!-- ======= Hero Section ======= -->
                <section id="hero" class="d-flex justify-content-center align-items-center">
                    @yield('content')

                </section><!-- End Hero -->


                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

                <!-- Vendor JS Files -->
                <script src="assets/vendor/purecounter/purecounter.js"></script>
                <script src="assets/vendor/aos/aos.js"></script>
                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                <script src="assets/vendor/php-email-form/validate.js"></script>

                <!-- Template Main JS File -->
                <script src="assets/js/main.js"></script>

                </body>

                </html>
