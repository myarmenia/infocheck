<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
    <body class="stretched device-xl back_fixed no-transition">

            @include('../includes.main_menu' )
            @include('../includes.mini_menu' )

     <section id="content" style="margin-bottom: 0px;" >

              <div class="content-wrap">
                  <div class="container clearfix own">
                      <div class="row container clearfix own" id="main_poster">
                      @yield('main_poster')
                      </div>
                  </div>
                      @yield('posts_by_cat')
              </div>
              @include('../includes.question_icon')
              @include('../includes.right_side')
     </section>
     @include('../includes.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')

    </body>
    </html>
