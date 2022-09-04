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
                 style="color: lightgreen">
                {{ Session::get('success') }}
            </div> @endif
        @if(Session::has('eror'))
            <div class="alert alert-danger" role="alert"
                 style="color: red"
            >
                {{ Session::get('eror') }}   </div> @endif

        <form method="POST" class="form"
              action="{{ route('zone.apdate', $p['id'] ) }}" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <h1 class="page-header"
                    style="color: white"
                >Edit zone</h1>
            </div>
            <br><br><br>
            <div class="row">





                <div class="col-md-7 form-group">
                    <input id="nom" type="text" class="form-text" name="nom" value="{{ $p['nom'] }} "
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
                        @if( $p['admin']==$i['id'])
                                <option value="{{$i['id']}}" selected>{{$i['fname']}} {{$i['lname']}}</option>
                             @else
                                <option value="{{$i['id']}}">{{$i['fname']}} {{$i['lname']}}</option>
                            @endif


                            @endforeach


                    </select>


                </div>
                <br><br>


                <div class="col-md-7 form-group">
                    <input type="submit" value="save" class="form__btn">

                </div>


        </form>
@endsection
