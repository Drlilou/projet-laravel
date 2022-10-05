   @extends($app)



   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


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
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                   aria-controls="tab-1" aria-selected="true">Don</a>
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
                                    <li class="nav-item">
                                        <a class="nav-link active" id="1-tab" data-toggle="tab"
                                           href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Don</a></li>
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


                                        @if(Auth::guard('web')->check())
                                     {{--   route('add_don',$data['id'])}}--}}
                                            <form method="POST" class="form"
                                                  action="{{ route('add_don',$missing_products[0]['idmp']) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <h1 class="page-header"
                                                        style="color: white"
                                                    >don</h1>
                                                </div>
                                                <br>
                                                <div class="row">





                                                    <div class="col-md-7 form-group">
                                                    <lebel style="color:white "">Phone  : </lebel>    <input id="phone" type="number" class="form-text"
                                                               name="phone" value="{{ old('phone') }}"
                                                               style="background: #4b4949;color: white;
    width: 287px;
    height: 43px;
    border-radius:1%;
"

                                                               placeholder="" required >
                                                    </div>

                                                    <div class="col-md-7 form-group">
                                                        <lebel style="color:white "">Quantity :</lebel>      <input id="Quantity" type="number"
                                                                                   class="form-text"
                                                               name="Quantity" value="{{ old('Quantity') }}"
                                                               style="background: #4b4949;color: white;
    width: 287px;
    height: 43px;
    border-radius:1%;
        margin-top: 5px;


"

                                                               placeholder="" required >
                                                    </div>

                                                    <br><br><br>


                                                    <div class="col-md-7 form-group">
                                                    </div>
                                                    <br><br>


                                                    <div class="col-md-7 form-group">
                                                        <input type="submit" value="save" class="form__btn">

                                                    </div>


                                            </form>

                                        @endif


                                    </div>
                                </div>
                                <!-- end comments -->
                            </div>
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
