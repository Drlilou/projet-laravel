
@extends('layouts.app')

@section('content')
    <br><br><br>
    <br><br><br>

    @if (session('error'))
        <div class="alert alert-danger"
             style="color: red"
        >
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success"
             style="color: #93ffbc"
        >
            {{ session('success') }}
        </div>
    @endif
    <form  class="form"
          method="POST" action="{{ route('changePasswordPost') }}">
        @csrf

        <div class="col-lg-12">
            <h2 class="page-header"
                style="color: white"
            >Change password</h2>
        </div>
        <br><br><br>
        <div class="row">



        </div>
        <div class="row">



            <div class="col-md-8 form-group">


                <input id="current-password" type="password" class="form-text" name="current-password"
                       style="background: #4b4949;color: white"
                       placeholder="current-password" required >



            </div>      <div class="col-md-8 form-group">
                @if ($errors->has('current-password'))
                    <span class="help-block"   style="color: red">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                @endif
            </div>
            <br><br>
            <div class="col-md-8 form-group">


                <input id="new-password-confirm" type="password" class="form-text" name="new-password-confirm"
                       style="background: #4b4949;color: white"
                       placeholder="new-password-confirm" required >



            </div>
            <div class="col-md-8 form-group">
                @if ($errors->has('new-password-confirm'))
                    <span class="help-block"   style="color: red">
                                        <strong>{{ $errors->first('new-password-confirm') }}</strong>
                                    </span>
                @endif
            </div>
            <br><br>
            <div class="col-md-8 form-group">
                <input id="new-password" type="password" class="form-text" name="new-password"
                       style="background: #4b4949;color: white"
                       placeholder="new-password" required >
            </div>
            <div class="col-md-8 form-group">
                @if ($errors->has('new-password'))
                    <span class="help-block"   style="color: red">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                @endif
            </div>


        </div>


  <input type="submit" value="save" class="form__btn">

    </form>



@endsection
