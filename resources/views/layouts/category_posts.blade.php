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
          @yield('posts')

          <div class="sidebar nobottommargin col_last widget_links">
          <div id="post-lists" class="widget clearfix">
          <h4 class="highlight-me">Recent Posts</h4>
          <div id="post-list-footer">
          <div class="spost clearfix">
              <a href="#" class="nobg">
              <div class="entry-image" style="background-image: url(images/services/1.jpg);background-size: cover;">
              </div>
              </a>
              <div class="entry-c">
              <div class="entry-title">
              <h4><a href="#">Lorem Ipsum is simply dummy text</a></h4>
              </div>
              <ul class="entry-meta">
              <li>10-07-2019</li>
              </ul>
              </div>
          </div>
          <div class="spost clearfix">
              <a href="#" class="nobg">
              <div class="entry-image" style="background-image: url(images/services/2.jpg);background-size: cover;">
              </div>
              </a>
              <div class="entry-c">
              <div class="entry-title">
              <h4><a href="#">Lorem Ipsum is simply dummy text</a></h4>
              </div>
              <ul class="entry-meta">
              <li>10-07-2019</li>
              </ul>
              </div>
          </div>
          <div class="spost clearfix">
              <a href="#" class="nobg">
              <div class="entry-image" style="background-image: url(images/services/3.jpg);background-size: cover;">
              </div>
              </a>
              <div class="entry-c">
              <div class="entry-title">
              <h4><a href="#">Lorem Ipsum is simply dummy text</a></h4>
              </div>
              <ul class="entry-meta">
              <li>10-07-2019</li>
              </ul>
              </div>
          </div>
          <div class="spost clearfix">
              <a href="#" class="nobg">
              <div class="entry-image" style="background-image: url(images/services/3.jpg);background-size: cover;">
              </div>
              </a>
              <div class="entry-c">
              <div class="entry-title">
              <h4><a href="#">Lorem Ipsum is simply dummy text</a></h4>
              </div>
              <ul class="entry-meta">
              <li>10-07-2019</li>
              </ul>
              </div>
          </div>
          <div class="spost clearfix">
              <a href="#" class="nobg">
              <div class="entry-image" style="background-image: url(images/services/2.jpg);background-size: cover;">
              </div>
              </a>
              <div class="entry-c">
              <div class="entry-title">
              <h4><a href="#">Lorem Ipsum is simply dummy text</a></h4>
              </div>
              <ul class="entry-meta">
              <li>10-07-2019</li>
              </ul>
              </div>
          </div>
          </div>
          </div>
          </div>

    </div>
  </div>
</section>


     {{-- @include('../includes.footer') --}}

    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')
    </body>
    </html>
