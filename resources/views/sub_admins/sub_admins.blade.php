@extends('.sub_admins.app')
@section('style')
@endsection
@section('content')


<section style="background-color:#2b2b31">
    <div class="container py-5">

        <div class="form"
             >


            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-12">
                <h1 class="page-header"
                    style="color: white"
                >Profile</h1>
            </div>








        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">

                    </ol>
                </nav>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-9">
                                <span class="sign__text">Fname <a>{{ Auth::guard('sub_admins')->user()->fname }}</a></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">Lname <a>{{ Auth::guard('sub_admins')->user()->lname }}</a></span>

                            </div>
                        </div>

                        <hr>
                        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">username <a>{{ Auth::guard('sub_admins')->user()->username }}</a></span>

                            </div>
                        </div>
                        <hr>        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">Email <a>{{ Auth::guard('sub_admins')->user()->email }}</a></span>

                            </div>
                        </div>
                        <hr>   <div class="row">

                            <div class="col-sm-9">
                                <span class="sign__text">password <a>************</a></span>
                            </div> <div class="col-sm-3">
                                <a class="-item" href="{{ route('changePasswordGet') }}">Change </a>

                            </div>
                        </div>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</section>
@endsection
