@extends('.admin.app')

@section('style')

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
    <style>
        .dataTables_wrapper{
            background: #d9d9d9;
        }


    </style>

@endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-lg-12">
        <h2 class="page-header"
            style="
    color: white"
        >Zones</h2>
    </div>
    <br>
    @if(Session::has('success'))
        <div role="alert" style="color: #8effbb ;   font-size: 24px;
">
            {{ Session::get('success') }}
        </div> @endif
    @if(Session::has('error'))    <div style="color: #ff6b78;    font-size: 24px;
" role="alert">
        {{ Session::get('error') }}   </div>
    @endif

    <br>
    <br>
    <br>
    <br>
    <br>


        <table class="table table-striped table-bordered table-hover dataTable no-footer"
               id="dataTables-example" aria-describedby="dataTables-example_info"
               style="
    background: #d9d9d9;
"
        >
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('messages.nom')}}</th>
                <th scope="col">{{__('messages.fname admin')}}</th>
                <th scope="col">{{__('messages.lname admin')}}</th>
                <th scope="col">{{__('messages.email admin')}}</th>
                <th scope="col">{{__('messages.username admin')}}</th>
                <th scope="col">{{__('messages.operation')}}</th>

            </tr>
            </thead>
            <tbody>
            @php

            //$x= ($_GET['page']-1)*10+1;
            $x= 1;
            @endphp
            @foreach ($data as $user)
                <tr>



                    <td scope="row">{{$x, $x}}</td>
                    <td scope="row">{{$user['nom']}}</td>
                    <td scope="row">{{$user['fname']}}</td>
                    <td scope="row">{{$user['lname']}}</td>
                    <td scope="row">{{$user['email']}}</td>
                    <td scope="row">{{$user['username']}}</td>

                    <td>

                        <a  href="{{
                                route('zone.delet',$user['idzone'])
                              }}"class="nav-link"  onclick="return confirm('Etes-vous sûr?');">
                            <button type="button" >
                                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                </svg>
                            </button>
                        </a>


                        <a  href="{{
                                      route('zone.edit',$user['idzone'])
                                    }}"class="nav-link" >
                            <button type="button" >
                                <svg style="color:#2086ff" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                </svg>

                            </button>
                        </a>

                    </td>

                </tr>

                @php
                    $x++;
                @endphp
            @endforeach

            </tbody>
        </table>
@endsection
@section('script')

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

@endsection



