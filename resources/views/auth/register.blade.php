@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<br>
<br>
<div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->
                    <form  class="sign__form"
                          method="POST" action="{{ route('register') }}">
                            @csrf


                        <div class="sign__group">
                            <input id="email" type="email" class="sign__input @error('email')
                                is-invalid @enderror" name="email"
                                   required autocomplete="email"
                                   placeholder="email"
                                   autofocus
                                   style=" width: max-content; "


                            >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            </div>
                        <div class="sign__group">
                            <input id="lname" type="text" class="sign__input @error('lname')
                                is-invalid @enderror" name="lname"
                                   required autocomplete="lname"
                                   placeholder="lname"
                                   autofocus
                                   style=" width: max-content; "
                            >
                            @error('lname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            </div>

                        <div class="sign__group">
                            <input id="fname" type="text" class="sign__input @error('fname')
                                is-invalid @enderror" name="fname"
                                   required autocomplete="fname"
                                   placeholder="fname"
                                   autofocus
                                   style=" width: max-content; "
                            >

                            @error('fname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            </div>
                        <div class="sign__group">
                            <input id="username" type="text" class="sign__input @error('username')
                                is-invalid @enderror" name="username"
                                   required autocomplete="username"
                                   placeholder="username"
                                   autofocus
                                   style=" width: max-content; "

                            >
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            </div>

                        <div class="sign__group">
                            <input id="password" type="password" class="sign__input @error('password')
                                is-invalid @enderror" name="password" required autocomplete="current-password"
                                   placeholder="{{ __('messages.Password') }}"

                                   style=" width: max-content; "
                            >

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror</div>
                        <div class="sign__group">
                            <input id="password" type="password" class="sign__input @error('password')
                                is-invalid @enderror"name="password_confirmation" required autocomplete="new-password"
                                   placeholder="password_confirm"
                                   style=" width: max-content; "

                            >

                            @error('password_confirm')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror</div>

                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">Remember Me</label>



                        </div>

                        <div class="col-md-8 form-group">
                        </div>
                        <div class="col-md-8 form-group mt-3 mt-md-0">




                        </div>
                        <div class="singel-form form-group">

                        </div>

                        <button class="sign__btn" type="submit" > Sign up</button>

                        <span class="sign__text">I have an account? <a href="{{route('login')}}">Sign in!</a></span>

                    </form>
                    <!-- end authorization form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
