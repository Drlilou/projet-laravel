@extends('.sub_admins.app')
@section('content')
    <br>
    <br>
    <br>
    <div class="col-lg-12">
    </div>
    <br>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert"
        style="color: #94ffaa"

        >
            {{ Session::get('success') }}
        </div> @endif

    @if(Session::has('eror'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('eror') }}   </div> @endif

    <form method="POST" class="form"
          action="{{ route('news.apdate',$p['id'])}}" enctype="multipart/form-data">
        @csrf

        <div class="col-lg-12">
            <h1 class="page-header"
                style="color: white"
            >Edit news</h1>
        </div>
        <br><br><br>
        <div class="row">



        </div>
        <div class="row">



            <div class="col-md-6 form-group">

                <input id="titre" type="text" class="form-text" name="titre"  value="{{ $p['titre'] }}"
                       style="background: #4b4949;color: white"
                       placeholder="Titre" required >


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
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="file" class="sign__text"

                       id="file" class="form-control"  name="image">
            </div>
        </div>
        <br><br>
        <textarea id="description"  name="description"  class="form__textarea" placeholder="Description"
                  style="background: #4b4949"> {{ $p['description'] }} </textarea>
        <input type="submit" value="apdate" class="form__btn">

    </form>

@endsection
