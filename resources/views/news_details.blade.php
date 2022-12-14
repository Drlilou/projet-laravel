   @extends($app)



   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


@section('content')
    @if(Session::has('eror'))    <div class="alert alert-success" role="alert">
        {{ Session::get('eror') }}   </div>
    @endif




    <!-- details -->
    <section class="section details">
        <!-- details background -->
        <div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
        <!-- end details background -->

        <!-- details content -->
        <div class="container">
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="details__title">{{ $data['titre'] }}</h1>
                </div>
                <!-- end title -->


                <!-- content -->
                <div class="col-12 col-xl-12">
                    <div class="card card--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                                <div class="card__cover">
                                    <img src="{{asset('images/news/'.$data['image'])}}"
                                         alt="Image" class="img-fluid"
                                         style="
    height: 173px;
    width: 156px;
"
                                    >
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                                <div class="card__content">




                                    <div class="card__description card__description--details">
                                        {{ $data['description'] }}
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->


            </div>
        </div>
        <!-- end details content -->
    </section>
    <!-- end details -->

    <!-- content -->
    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Discover</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-3" aria-selected="false">doone</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Comments">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <!-- content tabs -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                            <div class="row">
                                <!-- comments -->
                                <div class="col-12">
                                    <div class="comments">
                                        <ul class="comments__list">
                                            @foreach ($comments as $comment)

                                                <li class="comments__item">
                                                    <div class="comments__autor">
                                                        <img class="comments__avatar" src="img/user.png" alt="">
                                                        <span class="comments__name">
                                                    {{$comment['fname']}} {{$comment['lname']}}
                                                    </span>
                                                        <span class="comments__time">{{$comment['updated_at']}}</span>
                                                    </div>
                                                    <p class="comments__text">{{$comment['content']}}</p>
                                                    <div class="comments__actions">
                                                        @if(Auth::guard('web')->check()))
                                                        @if(Auth::guard('web')->user()->id==$comment['userid'])
                                                            <a  href="{{route('comment.delet',$comment['id'])}}
                                                                ">  <button type="button" class="btn btn-danger">
                                                                    <svg   style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                                                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                                                    </svg>

                                                                </button>

                                                            </a>

                                                        @endif

                                                        @endif
                                                    </div>


                                                </li>

                                            @endforeach


                                        </ul>


                                        @if(Auth::guard('web')->check()))

                                        <form action="{{route('add_commment',$data['id'])}}" method="post" class="form">
                                            @csrf
                                            <textarea id="text" name="content" class="form__textarea" placeholder="Add comment"></textarea>
                                            <input type="submit" value="save" class="form__btn">

                                        </form>


                                        @endif


                                    </div>
                                </div>
                                <!-- end comments -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                            <div class="row">
                                <!-- comments -->
                                <div class="col-12">
                                    <div class="comments">

                                        <div class="accordion__card">
                                            <div class="card-header" id="headingOne">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span> Liste des produits manquants</span>

                                                </button>

                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="accordion__list">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>Quantity</th>
                                                            <th>action</th>
                                                        </tr>
                                                        </thead>
                                                        @php
                                                        $cpt=1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach ($missing_products as $missing_product)
                                                                <tr>
                                                                <th>{{$cpt}}</th>
                                                                <td>{{$missing_product['name']}}</td>
                                                                <td>{{$missing_product['Quantity']}} {{$missing_product['measruing_unit']}}</td>

                                                                <td>
                                                                    <a  href="{{route('don',$missing_product['idmp'])}}">
                                                                            <i  style="color: #20ebff;"
                                                                                class='fa fa-handshake-o'></i>
                                                                    </a>
                                                                </td>
                                                                </tr>
                                                                @php
                                                                    $cpt++;
                                                                @endphp
                                                                    @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                                </div>
                                        </div>


                                            @if(Auth::guard('web')->check()))

                                            <div class="card-header" id="headingOne">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span> votre dons</span>

                                                </button>

                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="accordion__list">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                        </thead>
                                                        @php
                                                            $cpt=1;
                                                        @endphp
                                                        <tbody>

                                                        @foreach ($don as $d)
                                                            <tr>
                                                                <th>{{$cpt}}</th>
                                                                <td>{{$d['name']}}</td>
                                                                <td>{{$d['Quantity']}} {{$d['measruing_unit']}}</td>

                                                            </tr>
                                                            @php
                                                                $cpt++;
                                                            @endphp
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    @if(Auth::guard('sub_admins')->check()))
                                                    @if(Auth::guard('sub_admins')->user()->id==$id_sub_admin)


                                                        <div class="form">
                                                            <div class="form-group">
                                                                <div class="col-md-7 form-group" style="display: flex;">
                                                                    <label style="
    color: white;
    font-size: 14px;
">quantit?? de produits manquants</label></div>
                                                                <div class="col-md-6 form-group" style="display: flex;">
                                                                    <input style="background: #4b4949;color: white;
                                                                        width: 287px; height: 43px;border-radius: 2%;
    font-size: 20px;"
                                                                           type="number" value="0" id="nb"
                                                                    >
                                                                </div>
                                                                <br>


                                                                <div class="col-md-7 form-group" style="display: flex;">

                                                                    <label style="
    color: white;
    font-size: 14px;
"> nombre de produits manquants</label></div>

                                                                <div class="col-md-6 form-group" style="display: flex;">
                                                                    <select name="country" id="category"
                                                                            class="form-text dynamic" data-dependent="name"
                                                                            style="background: #4b4949;color: white;
                                                                        width: 287px; height: 43px;
    font-size: 20px;

"
                                                                    >
                                                                        <option value="">Select category</option>
                                                                        @foreach($t as $row)
                                                                            <option > {{$row['category']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <br />




                                                                <br />

                                                                {{ csrf_field() }}
                                                                <br />
                                                                <script>
                                                                    $(document).ready(function(){
                                                                        $('.dynamic').change(function(){
                                                                            if($(this).val() != '')
                                                                            {
                                                                                var select = $(this).attr("id");
                                                                                var value = $(this).val();
                                                                                var nb = $("#nb").val();
                                                                                var dependent = $(this).data('dependent');
                                                                                var _token = $('input[name="_token"]').val();
                                                                                $.ajax({
                                                                                    url:"{{ route('dynamicdependent.fetch') }}",
                                                                                    method:"POST",
                                                                                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                                                                                    success:function(result)
                                                                                    {
                                                                                        $('#form').html(result);
                                                                                    }
                                                                                })
                                                                            }
                                                                        });



                                                                        $('#country').change(function(){
                                                                            $('#state').val('');
                                                                            $('#city').val('');
                                                                        });

                                                                        $('#state').change(function(){
                                                                            $('#city').val('');
                                                                        });



                                                                        $('.p').change(function(){
                                                                            if($(this).val() != '')
                                                                            {
                                                                                var select = $(this).attr("id");
                                                                                var value = $(this).val();
                                                                                var nb = $("#names").val();
                                                                                var dependent = $(this).data('dependent');
                                                                                var _token = $('input[name="_token"]').val();
                                                                                $.ajax({
                                                                                    url:"{{ route('dynamicdependent.fetch') }}",
                                                                                    method:"POST",
                                                                                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                                                                                    success:function(result)
                                                                                    {
                                                                                        $('#pp').html(result);
                                                                                    }
                                                                                })
                                                                            }
                                                                        });




                                                                    });
                                                                </script>
                                                                <form method="POST" class="form"

                                                                      action="{{ route('create_missing_products',$data['id']) }}" enctype="multipart/form-data">
                                                                    @csrf


                                                                    <div class="col-lg-12">
                                                                        <h1 class="page-header"
                                                                            style="color: white">Ajouter des produits manquants</h1>
                                                                    </div>
                                                                    <br><br><br>
                                                                    <div class="row">
                                                                    </div>
                                                                    <div class="row" id="form" style="
    display: block;
">






                                                                        <br><br><br>
                                                                        <div class="col-md-7 form-group">

                                                                        </div>
                                                                        <br><br>
                                                                        <div class="row">
                                                                            <div class="col-md-7 form-group">


                                                                            </div>

                                                                        </div>

                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-md-7 form-group">
                                                                        </div>

                                                                    </div>
                                                                    <br><br>
                                                                    <input type="submit" value="save" class="form__btn">

                                                                </form>

                                                            </div>

                                                        </div>
                                                    @endif
                                                    @endif

                                                </div>
                                            </div>


                                            @endif

                                            @if(Auth::guard('sub_admins')->check()))
                                    @if(Auth::guard('sub_admins')->user()->id==$id_sub_admin)

                                        <div class="accordion__card">

                                    <div class="card-header" id="headingOne">
                                                <button type="button" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <span>  dons</span>

                                                </button>

                                            </div>


                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="accordion__list">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>Quantity</th>
                                                            <th>phone</th>

                                                        </tr>
                                                        </thead>
                                                        @php
                                                            $cpt=1;
                                                        @endphp
                                                        <tbody>

                                                        @foreach ($don as $d)
                                                            <tr>
                                                                <th>{{$cpt}}</th>
                                                                <td>{{$d['name']}}</td>

                                                                <td>{{$d['Quantity']}} {{$d['measruing_unit']}}</td>
                                                                <td>{{$d['phone']}}</td>
                                                         </tr>
                                                            @php
                                                                $cpt++;
                                                            @endphp
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    @if(Auth::guard('sub_admins')->check()))
                                                    @if(Auth::guard('sub_admins')->user()->id==$id_sub_admin)
                                                    @endif
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                            @endif
                                            @endif


                                    @if(Auth::guard('sub_admins')->check()))
                                    @if(Auth::guard('sub_admins')->user()->id==$id_sub_admin)


                                        <div class="form">
                                            <div class="form-group">
                                                <div class="col-md-7 form-group" style="display: flex;">
                                                    <label style="
    color: white;
    font-size: 14px;
">quantit?? de produits manquants</label></div>
                                                <div class="col-md-6 form-group" style="display: flex;">
                                                    <input style="background: #4b4949;color: white;
                                                                        width: 287px; height: 43px;border-radius: 2%;
    font-size: 20px;"
                                                           type="number" value="0" id="nb"
                                                    >
                                                </div>
                                                <br>


                                                <div class="col-md-7 form-group" style="display: flex;">

                                                    <label style="
    color: white;
    font-size: 14px;
"> Cat??gories </label></div>

                                                <div class="col-md-6 form-group" style="display: flex;">
                                                    <select name="country" id="category"
                                                            class="form-text dynamic" data-dependent="name"
                                                            style="background: #4b4949;color: white;
                                                                        width: 287px; height: 43px;
    font-size: 20px;

"
                                                    >
                                                        <option value="">Select category</option>
                                                        @foreach($t as $row)
                                                            <option > {{$row['category']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br />




                                                <br />

                                                {{ csrf_field() }}
                                                <br />
                                                <script>
                                                    $(document).ready(function(){
                                                        $('.dynamic').change(function(){
                                                            if($(this).val() != '')
                                                            {
                                                                var select = $(this).attr("id");
                                                                var value = $(this).val();
                                                                var nb = $("#nb").val();
                                                                var dependent = $(this).data('dependent');
                                                                var _token = $('input[name="_token"]').val();
                                                                $.ajax({
                                                                    url:"{{ route('dynamicdependent.fetch') }}",
                                                                    method:"POST",
                                                                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                                                                    success:function(result)
                                                                    {
                                                                        $('#form').html(result);
                                                                    }
                                                                })
                                                            }
                                                        });



                                                        $('#country').change(function(){
                                                            $('#state').val('');
                                                            $('#city').val('');
                                                        });

                                                        $('#state').change(function(){
                                                            $('#city').val('');
                                                        });



                                                        $('.p').change(function(){
                                                            if($(this).val() != '')
                                                            {
                                                                var select = $(this).attr("id");
                                                                var value = $(this).val();
                                                                var nb = $("#names").val();
                                                                var dependent = $(this).data('dependent');
                                                                var _token = $('input[name="_token"]').val();
                                                                $.ajax({
                                                                    url:"{{ route('dynamicdependent.fetch') }}",
                                                                    method:"POST",
                                                                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                                                                    success:function(result)
                                                                    {
                                                                        $('#pp').html(result);
                                                                    }
                                                                })
                                                            }
                                                        });




                                                    });
                                                </script>
                                                <form method="POST" class="form"

                                                      action="{{ route('create_missing_products',$data['id']) }}" enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="col-lg-12">
                                                        <h1 class="page-header"
                                                            style="color: white">Ajouter des produits manquants</h1>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="row">
                                                    </div>
                                                    <div class="row" id="form" style="
    display: block;
">






                                                        <br><br><br>
                                                        <div class="col-md-7 form-group">

                                                        </div>
                                                        <br><br>
                                                        <div class="row">
                                                            <div class="col-md-7 form-group">


                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-7 form-group">
                                                        </div>

                                                    </div>
                                                    <br><br>
                                                    <input type="submit" value="save" class="form__btn">

                                                </form>

                                            </div>

                                        </div>
                                    @endif
                                    @endif


                                    </div>
                                </div>
                                <!-- end comments -->
                            </div>


                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                            <!-- project gallery -->
                            <div class="gallery" itemscope>
                                <div class="row">

                                 @foreach ($photos as $photo)
                                    <figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
                                        <a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
                                            <img src="{{asset('images/news/'.$photo['img'])}}"
                                                 itemprop="thumbnail" alt="Image description"
                                                 style="
    height: 290px;
    width: 221px;
"
                                            />

                                        </a>
                                        <figcaption itemprop="caption description">Some image caption 1</figcaption>
                                    </figure>
                                    <!-- end gallery item -->

                                        @endforeach


                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>
                    </div>
                    <!-- end content tabs -->
                </div>

            </div>
        </div>
    </section>
    <!-- end content -->



    <!-- end content -->


@endsection
