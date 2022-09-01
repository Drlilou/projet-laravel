@extends('layouts.app')

@section('title')
   {{__('title.admin_login')}}

@endsection
@section('content')
    <div class="row">

    <div  class="pef"></div>
        <div class="address">
            <h4>{{__('messages.save.admin.login') }}:</h4>

        </div>
        <form  method="POST"  action="{{ route('save.admin.login') }}"  class="pef">
            @csrf
        <div class="row" >
            <div class="col-md-8 form-group">
                 <input id="username" type="text" class="form-control @error('username')
                     is-invalid @enderror" name="username" value="{{ old('username') }}"
                        required autocomplete="username"
                        placeholder="{{ __('messages.username') }}"
                        autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-8 form-group">
            </div>
            <div class="col-md-8 form-group mt-3 mt-md-0">
                <input id="password" type="password" class="form-control @error('password')
                    is-invalid @enderror" name="password" required autocomplete="current-password"
                       placeholder="{{ __('messages.Password') }}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


            </div>
            <div class="">

                <button type="submit" >
                    {{ __('messages.Login') }}
                </button>
            </div>

        </div>

    </form>
    </div>
    </div>

@endsection
