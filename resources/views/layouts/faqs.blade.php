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
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url(app()->getLocale().'/')}}">{{trans('text.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('faqs', app()->getLOcale()) }}">{{trans('text.faqs')}}</a></li>

                            </ol>
                          </div>
                          @yield('faqs')

              </div>
     </section>
     @include('../includes.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')
  <script>
        $('#textquest').val('');
   </script>
    </body>
    </html>
