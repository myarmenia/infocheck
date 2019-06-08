<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
    <body class="stretched device-xl no-transition back_fixed">

        <div id="loading"><h1></h1></div>
        <div id="loaded" class="animate-bottom">

            @include('../includes.main_menu' )
            @include('../includes.mini_menu' )
            @include('../includes.subscribe_response');

            <section id="content" style="margin-bottom: 0px;">


                    <div class="content-wrap">
                        <div class="container clearfix">
                            <div class="row">
                            @yield('about')
                            </div>
                        </div>
                    </div>
                    @include('../includes.right_side')
            </section>
            @include('../includes.footer')
        </div>
    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')

    </body>
    </html>
