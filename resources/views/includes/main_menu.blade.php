
     <header id="header" class="full-header">
            <div id="header-wrap" class="">
            <div class="container clearfix">
                      <div id="logo" title="Icheck">
                        <a href="{{url(app()->getLocale().'/')}}" class="standard-logo" data-dark-logo="/images/logo-dark.png"><img src="/images/logo.png" alt=" Logo"></a>
                        <a href="{{url(app()->getLocale().'/')}}" class="retina-logo" data-dark-logo="/images/logo-dark@2x.png"><img src="/images/logo@2x.png" alt="Logo"></a>

                    <button class="own burger2"><i class="icon-reorder"></i></button>
                    </div>
                    <h1 class="info_">{{trans('text.info_')}}</h1>
                <nav class='greedy'>
                    <ul class='links sf-js-enabled'>
                        <!-- hb-fill-middle2-bg -->
                      @foreach ($data['menu'] as $item)
                          <li class="hbtn hb-fill-right "><a href="{{url(app()->getLocale().'/post/'.urlencode($item->item_id))}}"
                             class="sf-with-ul ">{{$item->name}}</a></li>
                      @endforeach
                    <li  class="hbtn hb-fill-right"><a href="{{url(app()->getLocale().'/about')}}"
                            class="sf-with-ul">{{trans('text.about_us')}}</a></li>
                    </ul>
                    <button class="own"><i class="icon-reorder"></i></button>

                    <ul class='hidden-links hidden'></ul>

                    <div id="top-cart">
                    <a href="#" id="top-cart-trigger"><i class="icon-calendar21"></i></a>
                    <div class="top-cart-content">

                    <div class="top-cart-items">
                            <div id="arch" style="z-index:1000">
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

                    <input type="text"  class="form-control" name="s" value="{{ Request::query('s') }}" placeholder="{{trans('text.search')}}" autocomplete="off">
                    <i class="icon-searchengin"></i>
                    </form>
                    </div>
                    <div id="top-langs">
                            <ol class="breadcrumb breadcrumb_omg" style=" font-weight: bolder">
                            <?php
                                $lngg=config('app.locales');
                                $trans = config('app.locale_trans');
                            ?>
                            @foreach (config('app.locales') as $item => $name)
                            <li class="breadcrumb-item1" title="{{$lngg[$item]}}">
                            @if (Route::current()->getName() !== 'register' && Route::current()->getName() !== 'login' &&
                                 Route::current()->getName() !== 'faqs' && Route::current()->getName() !== 'index_page' &&
                                 Route::current()->getName() !== 'about_us')
                             @switch($data['call'])
                                 @case('archieve')
                                 <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$item,'date' => $data['date']]) }}"
                                        @if (app()->getLocale() == $item) style="display:none" @endif  >  &nbsp;
                                        {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                       </a>
                                     @break
                                 @case('single')
                                 <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$item,'unique_id' => $data['unique_id'],'title' => $data['title'] ]) }}"
                                        @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                        {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                       </a>
                                     @break
                                @case('tags')
                                <a href="{{url('/')}}"
                                    @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                    {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                    </a>
                                    @break
                                @case('search')
                                <a href="{{url('/')}}"
                                    @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                    {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                    </a>
                                    @break
                                @case('404')
                                <a href="{{url('/')}}"
                                    @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                    {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                        </a>
                                        @break

                                 @default
                                 <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$item,'category_item_id' => $data['item_id'] ]) }}"
                                    @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                    {{ $trans[$item] }}

                                            @if (app()->getLocale() !== 'ru')
                                                @if (!$loop->last)  <span class="lang-divider"> |</span> @endif
                                            @else
                                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                            @endif
                                       </a>
                             @endswitch

                             @else
                             <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$item]) }}"
                                    @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                                    {{ $trans[$item] }}

                                        @if (app()->getLocale() !== 'ru')
                                            @if (!$loop->last) <span class="lang-divider"> |</span> @endif
                                        @else
                                            @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                                        @endif
                                    </a>
                             @endif

                            </li>
                            @endforeach
                            </ol>
                    </div>

            </nav>
            </div>

            </div>

            </header>
