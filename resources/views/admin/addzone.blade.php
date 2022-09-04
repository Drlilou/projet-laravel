@extends('.admin.app')
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

        <form method="POST" class="form"
              action="{{ route('create_zone') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <h1 class="page-header"
                    style="color: white"
                >add zone</h1>
            </div>
            <br><br><br>
            <div class="row">





                <div class="col-md-7 form-group">
                    <input id="nom" type="text" class="form-text" name="nom" value="{{ old('nom') }}"
                           style="background: #4b4949;color: white;
    width: 287px;
    height: 43px;
"

                           placeholder="nom" required >
                </div>

                <br><br><br>


                <div class="col-md-7 form-group">
                    <select
                    name="admin"
                    style="background: #4b4949;color: white; width: 287px; height: 43px;"
                    >
                        <option value="">choisir un admin de zone</option>

                    @foreach($data as $i)
                            <option value="{{$i['id']}}">{{$i['fname']}} {{$i['lname']}}</option>


                            @endforeach


                    </select>


                </div>
                <br><br>


                <div class="col-md-7 form-group">
                    <input type="submit" value="save" class="form__btn">

                </div>


        </form>
@endsection
