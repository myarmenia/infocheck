<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
    <body class="stretched device-xl no-transition">
            @include('../includes.mini_menu' )
            @include('../includes.main_menu' )

     <section id="content" style="margin-bottom: 0px;">

              <div class="content-wrap">
                  <div class="container clearfix">
                      <div class="row">
                      @yield('main_poster')
                      </div>
                  </div>
                      @yield('posts_by_cat')
              </div>
     </section>
     @include('../includes.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')

    </body>
    </html>
