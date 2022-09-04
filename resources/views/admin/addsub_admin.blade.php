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
              action="{{ route('create_sub_admin') }}" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12">
                <h1 class="page-header"
                    style="color: white"
                >add sub admin</h1>
            </div>
            <br><br><br>
            <div class="row">




                <div class="col-md-6 form-group">
                    <input id="fname" type="text" class="form-text" name="fname" value="{{ old('fname') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="Fname" required >
                </div>
                <br><br>

                <div class="col-md-6 form-group">
                    <input id="lname" type="text" class="form-text" name="lname" value="{{ old('lname') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="Lname" required >
                </div>
                <br><br>

                <div class="col-md-6 form-group">
                    <input id="username" type="text" class="form-text" name="username" value="{{ old('username') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="username" required >
                </div>
                <br><br>
                <div class="col-md-6 form-group">
                    <input id="email" type="text" class="form-text" name="email" value="{{ old('email') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="email" required >
                </div>
                <br><br>

                <div class="col-md-6 form-group">
                    <input id="password" type="password" class="form-text" name="password"
                           value="{{ old('password') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="password" required >
                </div>
                <br><br>

                <div class="col-md-6 form-group">
                    <input id="password-confirm" type="password" class="form-text"
                           name="password_confirmation" value="{{ old('password-confirm') }}"
                           style="background: #4b4949;color: white;     width: inherit; height: 43px;"
                           placeholder="password-confirm" required >
                </div>
                <br><br>





            <input type="submit" value="save" class="form__btn">

        </form>
@endsection
