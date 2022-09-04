



 <html lang="en"><head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Font -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

     <!-- CSS -->
     <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
     <link rel="stylesheet" href="css/bootstrap-grid.min.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
     <link rel="stylesheet" href="css/nouislider.min.css">
     <link rel="stylesheet" href="css/ionicons.min.css">
     <link rel="stylesheet" href="css/plyr.css">
     <link rel="stylesheet" href="css/photoswipe.css">
     <link rel="stylesheet" href="css/default-skin.css">
     <link rel="stylesheet" href="css/main.css">

     <!-- Favicons -->
     <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
     <link rel="apple-touch-icon" href="icon/favicon-32x32.png">
     <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
     <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
     <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">








     <!-- Favicons -->
     <link href="../assets/img/favicon.png" rel="icon">
     <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

     <!-- Vendor CSS Files -->

     <!-- Template Main CSS File -->

     <!-- =======================================================
     * Template Name: Mentor - v4.7.0
     * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
     * Author: BootstrapMade.com
     * License: https://bootstrapmade.com/license/
     ======================================================== -->


     <style>
         .card__title{
         }
     </style>
     @yield('style')



















     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Dmitry Volkov">

     <title>
         @yield('title')
     </title>
 </head>
 <body class="body"
       style="
    background: #2b2b31"

 >

 <!--
     style="
    background: #2b2b31"
  -->
 <header class="header">
     <div class="header__wrap">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="header__content">

                         <!-- header nav -->
                         <ul class="header__nav">







                             <li class="header__nav-item">
                                 <a href="{{ url('/home') }}" class="header__nav-link">Home</a>
                             </li>


                             <li class="header__nav-item">
                                 <a href="{{ url('/news') }}" class="header__nav-link">news</a>
                             </li>


                             <li class="header__nav-item">
                                 <a  href="{{ route('add_zone') }}"  class="header__nav-link">add_zone</a>
                             </li>
                             <li class="header__nav-item">
                                 <a  href="{{ route('add_sub_admin') }}"  class="header__nav-link">add sub admin</a>
                             </li>
                             <li class="header__nav-item">
                                 <a href="{{ route('consulter_les_zones') }}"  class="header__nav-link">consulter les zones</a>
                             </li>

                             <li class="header__nav-item">
                                 <a href="{{ route('consulter_les_sub_admins') }}"  class="header__nav-link">SUB admins</a>
                             </li>


                         </ul>
                         <div class="header__auth">

                             @yield('btnsearch')

                             @guest

                                 <a  href="{{ route('logout') }}"  class="header__sign-in"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                             @else
                                 <li >


                                     <a  href="{{ route('logout') }}"  class="header__sign-in"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                     </form>
                                 </li>



                             @endguest

                         </div>





                         <!-- end header auth -->

                         <!-- header menu btn -->
                         <button class="header__btn" type="button">
                             <span></span>
                             <span></span>
                             <span></span>
                         </button>
                         <!-- end header menu btn -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @yield('search')

     <!-- end header search -->
 </header>
 @yield('content')

 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/jquery.mousewheel.min.js"></script>
 <script src="js/jquery.mCustomScrollbar.min.js"></script>
 <script src="js/wNumb.js"></script>
 <script src="js/nouislider.min.js"></script>
 <script src="js/plyr.min.js"></script>
 <script src="js/jquery.morelines.min.js"></script>
 <script src="js/photoswipe.min.js"></script>
 <script src="js/photoswipe-ui-default.min.js"></script>
 <script src="js/main.js"></script>
 @yield('script')


 <!-- Template Main JS File -->
 <!-- Template Main JS File -->
 <!-- Template Main JS File -->
 <!-- Template Main JS File -->
 <!-- Core Scripts - Include with every page -->
 </body></html>
