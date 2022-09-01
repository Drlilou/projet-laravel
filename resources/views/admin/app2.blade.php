


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @yield('title')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">








    <!-- Core CSS - Include with every page -->
    <link href="../assets1/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets1/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets1/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="../assets1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />







    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
@yield('style')

    <style>
    </style>


</head>

<body>


<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center pd1">

        <h1 class="logo me-auto"><a href="{{url('/admin')}}">espase admin</a></h1>


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>



                <li >
                    <a  href="{{ route('add_zone') }}">{{ __('messages.ajoutez zone') }}</a>
                </li>


                <li >
                    <a  href="{{ route('consulter_les_zones') }}">{{ __('messages.consulter_les_zones') }}</a>
                </li>



            @guest

                    <li class="dropdown"><a href="#"><span>{{ __('messages.login_link')}}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                           <li><a href="{{ route('login') }}">{{ __('messages.etudiant_login')}}</a></li>



                        </ul>
                    </li>



                @else



                    <li >


                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('messages.Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>



                @endguest




            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>


        </nav>









    </div>
</header><!-- End Header -->


<!-- ======= Hero Section ======= -->
<section id="" class="">

</section><!-- End Hero -->
<section id="contact" class="contact">


    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row mt-5">


            <div class="col-lg-12 mt-5 mt-lg-0">

                @yield('content')


            </div>

        </div>

    </div>
</section>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Template Main JS File -->
<!-- Template Main JS File -->
<!-- Template Main JS File -->
<!-- Template Main JS File -->
<!-- Core Scripts - Include with every page -->
<script src="../assets1/plugins/jquery-1.10.2.js"></script>
<script src="../assets1/plugins/bootstrap/bootstrap.min.js"></script>
<script src="../assets1/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../assets1/plugins/pace/pace.js"></script>
<script src="../assets1/scripts/siminta.js"></script>
<!-- Page-Level Plugin Scripts-->
<script src="../assets1/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../assets1/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>


