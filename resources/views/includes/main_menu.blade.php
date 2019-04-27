
     <header id="header" class="full-header">
            <div id="header-wrap" class="">
            <div class="container clearfix">
                      <div id="logo">
                        <a href="{{url(app()->getLocale().'/')}}" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt=" Logo"></a>
                        <a href="{{url(app()->getLocale().'/')}}" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="Logo"></a>
                    </div>
                <nav class='greedy'>
                    <ul class='links sf-js-enabled'>
                      @foreach ($data['menu'] as $item)
                          <li><a href="{{url(app()->getLocale().'/'.urlencode($item->name))}}"
                             class="sf-with-ul">{{$item->name}}</a></li>
                      @endforeach

                    </ul>
                    <button><i class="icon-reorder"></i></button>

                    <ul class='hidden-links hidden'></ul>

                    <div id="top-cart">
                    <a href="#" id="top-cart-trigger"><i class="icon-calendar1"></i></a>
                    <div class="top-cart-content">
                    <div class="top-cart-title">
                    <h4>Calendar</h4>
                    </div>
                    <div class="top-cart-items">
                        <div class="top-cart-item clearfix">
                        <div class="top-cart-item-image">
                        <a href="#"></a>
                        </div>
                        <div class="top-cart-item-desc">
                        <a href="#"></a>
                        <span class="top-cart-item-price"></span>
                        <span class="top-cart-item-quantity"></span>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                    </div>
            </nav>
            </div>
            </div>
            </header>
