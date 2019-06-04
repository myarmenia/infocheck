@extends('layouts.app')

@section('content')
<!-- AuthenticatesUsers -->

@if ($blocked_msg = session('blocked_msg'))
<div class="alert alert-danger alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $blocked_msg }}</strong>
</div>
@endif
<div class="card-body" style="padding:40px; margin:40px auto; max-width: 400px;min-height:65%">

        <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                @csrf
        <h3>{{ __('login.Login') }}</h3>
        <div class="col_full">
        <label for="email">{{ __('login.E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}  not-dark" name="email" value="{{ old('email') }}" required autofocus  >
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        </div>
        <div class="col_full">
        <label for="password" >{{ __('login.Password') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} not-dark" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>
        <div class="col_full nobottommargin">
        <button type="submit"  class="btn btn-secondary"> {{ __('login.Login') }}</button>
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
            {{ __('login.Forgot Your Password?') }}
        </a>
        @endif
        </div>
        </form>
        <div class="line line-sm"></div>
        <div class="center">
        <h4 style="margin-bottom: 15px;">{{trans('text.or_login')}}</h4>
        <a href="{{ url('/login/facebook') }}" class="button button-rounded si-facebook si-colored">Facebook</a>

        </div>
        </div>

@endsection
