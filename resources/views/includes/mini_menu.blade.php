<div id="wrapper" class="clearfix" style="opacity: 1; animation-duration: 1500ms;">

        <div id="top-bar">
         <div class="container clearfix">
          <div class="col_half nobottommargin">
           <div class="top-links">
            <ul class="sf-js-enabled clearfix" style="touch-action: pan-y;">
             <li><a href="index.html">Home</a></li>
             <li><a href="faqs.html">FAQs</a></li>
             <li><a href="login-register.html">Sign up</a></li>
             <li><a href="login.html" class="sf-with-ul">Login</a>
             </li>
            </ul>
           </div>
          </div>
                  <div>
                 <ol class="breadcrumb breadcrumb_omg">
                        {{-- @foreach (config('app.locales') as $item => $name)
                 <li class="breadcrumb-item1">
                     <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $item) }}"
                     @if (app()->getLocale() == $item) style="display:none" @endif >
                     {{ strtoupper($item) }} |
                    </a>
                    </li>
                    @endforeach --}}
             </ol>
             </div>
         </div>
        </div>
