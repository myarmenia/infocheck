@extends('layouts.subscribe')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verify.Verify Your Email Address For Subscription') }}</div>

                <div class="card-body">
                    @if (session('subscribeNote'))
                        <div class="alert alert-success" role="alert">
                            {{ __('verify.A fresh verification link has been sent to your email address') }}
                        </div>
                    @endif

                    {{ __('verify.Before proceeding, please check your email for a verification link') }}
                    {{ __('verify.If you did not receive the email') }},
                    <a href="{{route('subscribe.resend', ['locale'=>app()->getLocale(), 'token' => $token])}}">
                        {{ __('verify.click here to request another') }}
                    </a>.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

