@extends('.sub_admins.app')
@section('content')
    <br>
    <br>
    <br>    <br>
    <br>
    <br>

    <br>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert"
             style="color: lightgreen"

        >
            {{ Session::get('success') }}
        </div> @endif
    @if(Session::has('eror'))
        <div class="alert alert-danger" role="alert"
        style="color: red"
        >
            {{ Session::get('eror') }}   </div> @endif




    @if( $c>0)

        <form method="POST" class="form"
              action="{{ route('create_product') }}" >
            @csrf

            <div class="col-lg-12">
                <h1 class="page-header"
                    style="color: white"
                >add_product</h1>
            </div>
            <br><br><br>
            <div class="row">



            </div>
            <div class="row">


                <div class="col-md-7 form-group">

                    <input id="name" type="text" class="form-text" name="name" value="{{ old('name') }}"
                           style="background: #4b4949;color: white; width: 287px; height: 43px;
    color: white;
    width: inherit;
    height: 43px;
    margin-top: 4px;"
                           placeholder="Name" required >


                </div>
                <div class="col-md-7 form-group">

                    <input id="category" type="text" class="form-text" name="category" value="{{ old('category') }}"
                           style="background: #4b4949;color: white; width: 287px; height: 43px;
    color: white;
    width: inherit;
    height: 43px;
    margin-top: 4px;
"
                           placeholder="category" required >


                </div>
                <div class="col-md-7 form-group">

                    <input id="measruing_unit" type="text" class="form-text" name="measruing_unit" value="{{ old('measruing_unit') }}"
                           style="background: #4b4949;color: white; width: 287px; height: 43px;
    color: white;
    width: inherit;
    height: 43px;
    margin-top: 4px;"
                           placeholder="measruing_unit" required >


                </div>

<br>
                <div class="col-md-12 form-group">

                <input type="submit" value="save" class="form__btn">
                </div>


        </form>

    @else
        <div class="catalog">
            <div class="container">
                <div class="row">
                    <!-- card -->

                    <div class="alert alert-success" role="alert"
                         style="color: red">
                        Vous avez pas des zone, vous pouvez pas ajoutez news </div>

                    <!-- end paginator -->
                </div>
            </div>
        </div>    @endif




@endsection
