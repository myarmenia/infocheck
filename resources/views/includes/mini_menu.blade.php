<div id="wrapper" class="clearfix" style="opacity: 1; animation-duration: 1500ms;">

        <div id="top-bar">
         <div class="container clearfix own">
          {{-- <div class=""></div> --}}
           {{-- <div class="top-links"></div> --}}
            <ul id="top-side-btns" style="touch-action: pan-y;">
             <li>
             <a href="{{url(app()->getLocale().'/')}}">
                    <div class="home_link" title="{{trans('text.home')}}">
                            <i class="icon-line2-home"></i>
                    </div>
                </a>
            </li><li>
                <a href="{{route('faqs', app()->getLocale()) }}">
                    <div class="faq_link" style="padding: 2px 10px;" title="{{trans('text.faqs')}}">
                            <i class="icon-question"></i>
                    </div>
                </a>
            </li>
             @auth

                <li>
                    <a href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="logout_link" title="{{ __('login.Logout') }}">
                            <i class="icon-line2-logout"></i>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            @else
                @if (Route::current()->getName() !== 'register')
                <li>
                <a href="{{ route('register', app()->getLocale()) }}">
                    <div class="regis_link" title="{{ __('register.Register') }}">
                        <i class="icon-line2-user-follow"></i>
                    </div>
                </a>
                </li>
                @endif
                @if (Route::current()->getName() !== 'login')
                <li>
                <a href="{{ route('login', app()->getLocale()) }}">
                    <div class="login_link" title="{{ __('login.Login') }}">
                        <i class="icon-line2-login"></i>
                    </div>
                </a>
                </li>
                @endif
            @endauth
             </li>
            <!-- Subscriber's Email activation result session-message -->
            @if(session()->get('subscribeResponse') !== null)
            <style>
                @media (min-width: 768px) and (max-width: 991.98px) {

                    .info_ {
                        top: 168px;
                        color: #2d2f2f;
                        z-index: 1;
                    }
                    #logo img {
                        box-shadow: none;
                        height: 70px;
                    }

                }

            </style>
            @endif


             @isset(session()->get('subscribeResponse')['success'])
                <li class="nav-item subs-response">
                    <div class="alert alert-success alert-dismissible fade show" style="padding:0 1rem 0 2rem">
                        <button type="button" class="close" data-dismiss="alert" style="position: relative;">&times;</button>
                        {{ session()->get('subscribeResponse')['success'] }}
                    </div>
                </li>
             @endisset
             @isset(session()->get('subscribeResponse')['warning'])
                <li class="nav-item subs-response">
                    <div class="alert alert-warning alert-dismissible fade show" style="padding:0 1rem 0 2rem">
                        <button type="button" class="close" data-dismiss="alert" style="position: relative;">&times;</button>
                        {{ session()->get('subscribeResponse')['warning'] }}
                    </div>
                </li>
             @endisset

             @isset(session()->get('subscribeResponse')['error'])
                <li class="nav-item subs-response">
                    <div class="alert alert-danger alert-dismissible fade show" style="padding:0 1rem 0 2rem">
                        <button type="button" class="close" data-dismiss="alert" style="position: relative;">&times;</button>
                        {{ session()->get('subscribeResponse')['error'] }}
                    </div>
                </li>
             @endisset
            <!-- Subs msg-end -->
            </ul>



        <?php
        /*
            <div>
                 <ol class="breadcrumb breadcrumb_omg"  style=" font-weight: bolder">
                    <?php
                         $lngg=config('app.locales');
                         $trans = config('app.locale_trans');

                    ?>

                    @foreach (config('app.locales') as $item => $name)
                    <li class="breadcrumb-item1" title="{{$lngg[$item]}}">
                        <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$item]) }}"
                        @if (app()->getLocale() == $item) style="display:none" @endif > &nbsp;
                        {{ $trans[$item] }}

                            @if (app()->getLocale() !== 'ru')
                                @if (!$loop->last) <span class="lang-divider"> |</span> @endif
                            @else
                                @if ($loop->first)  <span class="lang-divider"> |</span> @endif
                            @endif
                        </a>
                    </li>
                    @endforeach
                 </ol>
            </div>
            */
            ?>
        </div>
    </div>

</div>

