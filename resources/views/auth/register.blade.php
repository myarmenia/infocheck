@extends('layouts.app')

@section('content')
<div class="form-widget">
        <div class="row"  style="padding: 20px;margin-top:40px">
        <div class="col-lg-4">
        <h3>{{trans('text.regi')}}</h3>
        <form method="POST" action="{{ route('register', app()->getLocale()) }}">
                @csrf

        <div class="form-process"></div>
        <div class="w-100"></div>
        <div class="col-12 form-group">
        <label for="name">{{ __('register.Name') }}</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}  required valid" name="name" value="{{ old('name') }}" required autofocus >
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        </div>
        <div class="col-12 form-group">
        <label for="email">{{ __('register.E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} required valid" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        </div>

        <div class="col-12 form-group">
        <label  for="password">{{ __('register.Password') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} required valid" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
         </div>
        <div class="col-12 form-group">
        <label for="password-confirm">{{ __('register.Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control required valid" name="password_confirmation" required>
         </div>






        <div class="col-12 hidden">
        <input type="text" id="realestate-enquiry-botcheck" name="realestate-enquiry-botcheck" value="">
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-secondary">  {{ __('register.Register') }}</button>
        </div><br/>
        <div class="center">
                <h4 style="margin-bottom: 15px;">{{trans('text.or_login')}}</h4>
                <a href="{{ url('/login/facebook') }}" class="button button-rounded si-facebook si-colored">Facebook</a>

                </div>
        </form>
        </div>
        <div class="col-lg-7 offset-lg-1">
        <blockquote class="topmargin bottommargin">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised</p>
        </blockquote>
        <div class="col_full nobottommargin">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>

        <div class="clear"></div>
        </div>
        </div>
        </div>



@endsection
