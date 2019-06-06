<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
    <body class="stretched device-xl no-transition">
            {{-- @include('../includes.mini_menu' ) --}}
            {{-- @include('../includes.main_menu' ) --}}


        <div id="wrapper" class="clearfix" style="opacity: 1; animation-duration: 1500ms;">

            <div id="top-bar">
                <div class="container clearfix">
                    <div class="col_half nobottommargin">

                        <div class="top-links">
                        <ul class="sf-js-enabled clearfix" style="touch-action: pan-y;">
                            <li><a href="{{url(app()->getLocale().'/')}}">{{trans('text.home')}}</a></li>
                            <li><a href="{{route('faqs', app()->getLOcale()) }}">{{trans('text.faqs')}}</a></li>
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout', app()->getLOcale()) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('login.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout', app()->getLOcale()) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <li><a href="{{ route('register', app()->getLocale()) }}">{{ __('register.Register') }}</a></li>
                            <li><a href="{{ route('login', app()->getLocale()) }}" class="sf-with-ul">{{ __('login.Login') }}</a></li>
                            @endauth
                        </ul>
                        </div>
                    </div>
                    <div>
                    <ol class="breadcrumb breadcrumb_omg">
                        @foreach (config('app.locales') as $loc => $name)
                            <li class="breadcrumb-item1">
                                <a class=""
                                {{-- href="{{ url('/', $loc) }}" --}}
                                href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$loc,'token' => $token]) }}"
                                    @if (app()->getLocale() == $loc) style="display:none" @endif>
                                    &nbsp; {{ strtoupper($loc) }} |
                                </a>
                            </li>
                        @endforeach
                    </ol>
                    </div>

                </div>
            </div>


            <section id="content" style="margin-bottom: 0px;">
                <div class="content-wrap1">
                <div id="logo" style='margin:0 40px'>
                    <a href="{{url(app()->getLocale().'/')}}" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt=" Logo"></a>
                    <a href="{{url(app()->getLocale().'/')}}" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="Logo"></a>
                </div>
                <div class="container clearfix">
                    <main class="py-4">
                            @yield('content')
                    </main>

                </div>
                </div>
                @include('../includes.right_side')
            </section>

            @include('../includes.footer')
        </div>
</body>
</html>
