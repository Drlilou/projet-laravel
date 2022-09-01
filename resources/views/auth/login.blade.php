{{--@extends('layouts.app')

@section('title')login

@endsection
@section('content')

--}}
    <div class="sign section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form method="POST"  action="{{ route('checklogin') }}"  class="sign__form">
                                @csrf


                            <div class="sign__group">
                                <input id="username" type="text" class="sign__input @error('username')
                                    is-invalid @enderror" name="username" value="{{ old('username') }}"
                                       required autocomplete="username"
                                       placeholder="{{ __('messages.username') }}"
                                       autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                            </div>

                            <div class="sign__group">
                                <input id="password" type="password" class="sign__input @error('password')
                                    is-invalid @enderror" name="password" required autocomplete="current-password"
                                       placeholder="{{ __('messages.Password') }}">

                                @error('password')                            </div>

                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">Remember Me</label>



                            </div>

                            <div class="col-md-8 form-group">
                            </div>
                            <div class="col-md-8 form-group mt-3 mt-md-0">

                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <div class="singel-form form-group">

                            </div>





                            admin
                                <input type="radio" name="type" class="" value="admin" checked>
                            sub_admin
                                <input type="radio" name="type" class="" value="sub_admin">
                            user

                                <input type="radio" name="type" class="" value="user">

                            <button class="sign__btn" type="submit" >Sign in</button>

                            <span class="sign__text">Don't have an account? <a href="{{route('register')}}">Sign up!</a></span>

                            <span class="sign__text"><a href="#">Forgot password?</a></span>
                        </form>
                        <!-- end authorization form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
{{--
@endsection--}}


