<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <!-- Language Menu -->

                <div class="top-right links">
                    @auth
                        <a href="{{ route('home', app()->getLocale()) }}">Home</a>
                    @else

                            {{-- @foreach (config('app.locales') as $locale => $name)

                                    <a class="nav-link"
                                    href="{{ url('/', $locale) }}"
                                        @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>
                                        {{ strtoupper($locale) }}
                                    </a>

                            @endforeach --}}

                        <a href="{{ route('login', app()->getLocale()) }}">{{ __('login.Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register', app()->getLocale()) }}">{{ __('register.Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div>
                    <a href="{{ route('add_comment', app()->getLocale()) }}">add comment. User must be Loged, Verified</a>
                    @if (Auth::check())
                        @if(Auth::user()->hasRole('i_user'))
                            <p style="color:red">This text shows only for i_user</p>
                        @endif

                        @if (Auth::user()->hasRole('i_admin'))
                            <p style="color:purple"> Content for ADMIN </p>
                        @endif
                    @endif

                </div>
                <div>
                    <h3>Image from Post-3</h3>
                    <img src="/storage/posts/3/3.jpg" alt="1.jpg" width="200"/>
                    <p>{{ date('d-m-Y')}}</p>
                </div>
            </div>

        </div>
    </body>
</html>
