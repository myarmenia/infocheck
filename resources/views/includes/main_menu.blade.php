
     <header id="header" class="full-header">
            <div id="header-wrap" class="">
            <div class="container clearfix">
                      <div id="logo" title="Icheck">
                        <a href="{{url(app()->getLocale().'/')}}" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt=" Logo"></a>
                        <a href="{{url(app()->getLocale().'/')}}" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="Logo"></a>
                    </div>
                <nav class='greedy'>
                    <ul class='links sf-js-enabled'>
                      @foreach ($data['menu'] as $item)
                          <li><a href="{{url(app()->getLocale().'/post/'.urlencode($item->item_id))}}"
                             class="sf-with-ul">{{$item->name}}</a></li>
                      @endforeach
                    <li><a href="{{url(app()->getLocale().'/about')}}"
                            class="sf-with-ul">{{trans('text.about_us')}}</a></li>
                    </ul>
                    <button><i class="icon-reorder"></i></button>

                    <ul class='hidden-links hidden'></ul>

                    <div id="top-cart">
                    <a href="#" id="top-cart-trigger"><i class="icon-calendar1"></i></a>
                    <div class="top-cart-content">

                    <div class="top-cart-items">
                            <div id="arch" style="z-index:1000;margin-left:3%;">
                                    <a class="lang" href="javascript:void(0);"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 23px;"></i></a>

                                    <div class="calendar" style=" display:block;">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {!! $data['event']->calendar() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </div>
                    </div>
                    <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="{{ route('search',
                    [  'locale'=> app()->getLocale()
                    ] ) }}"  method="GET">

                    <input style="background-color: white;" type="search"  class="form-control" name="s" value="{{ Request::query('s') }}" placeholder="{{trans('text.search')}}" autocomplete="off">
                    </form>
                    </div>
            </nav>
            </div>
            </div>
            </header>
