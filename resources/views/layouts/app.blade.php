<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
    <body class="stretched device-xl no-transition">
            @include('../includes.mini_menu' )
            @include('../includes.main_menu' )
            <section id="content" style="margin-bottom: 0px;">
                    <div class="content-wrap1">
                            {{-- <div id="logo" style='margin:0 40px'>
                                <a href="{{url(app()->getLocale().'/')}}" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt=" Logo"></a>
                                <a href="{{url(app()->getLocale().'/')}}" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="Logo"></a>
                            </div> --}}
                    <div class="container clearfix">
                    @yield('content')
                   </div>
                    </div>
                    </section>

        {{-- <main class="py-4">

        </main> --}}
        @include('../includes.footer')
        @include('../includes.scripts')

</body>
</html>
