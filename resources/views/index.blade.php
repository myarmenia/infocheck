@extends('layouts.index')
@section('posts_by_cat')

@for ($i = 0; $i <count($data['posts_by_menu']); $i++)
  <?php
       $k=$data['id'][$i];
      //echo $k;
      // die();
   ?>
   @if (count($data['posts_by_menu'][$i][$k])>0 )
    @switch($data['posts_by_menu'][$i]['layout'])
        @case('A')
        {{-- 3 hat verevy 1 hat  mec taky --}}
        <?php $limit=0; ?>
        <div  class="container clearfix mt-5">
                <div class="row">
                            <div class="owl-item  col-lg-12"  style="display: contents">
                             <span class="vert-line1"></span>
                             <span class="vert-line2"></span>
                             <span class="vert-line3"></span>
                            <h3 class="h3_omg" style="color: #0f1841">{{$data['posts_by_menu'][$i]['name']}}</h3>
                                  <div class="line line_omg" ></div>
                                      </div>
                 @foreach ($data['posts_by_menu'][$i][$k] as $item)
                 <?php $limit++;?>
                 @if ($limit<=3)
                 <div class="owl-item col-xs-12 col-sm-12 col-md-4 col-lg-4 bt-3">
                        <div class="hov nobottommargin">
                                <div class="feature-box media-box hov-hi-div-hid">
                        <div class="entry mb-0 hov-hi-div" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                                <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" class="own_link">
                                    </a>
                        </div>
                        <div class="text-overlay pl-4 pr-4 pb-2 hov-hi ">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h3 class="t600 mb-2"><a href="#" class="text-light">{!!str_limit($item->short_text , 50)!!}</a></h3>
                                        <ul class="entry-meta_omg clearfix">
                                            <li><i class="icon-calendar3"></i> {{ $item->date }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                        </div>
                    </div>

                 @else
                </div>
                 <div class="row clearfix">
                        <div class="owl-item col-lg-12">
                                <div class="hov nobottommargin">
                                        <div class="feature-box  media-box hov-hi-div-hid">
                            <div class="entry  hov-hi-div" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                                    <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" class="own_link">
                                        </a>
                            </div>
                            <div class="text-overlay pl-4 pr-4 pb-2 hov-hi">
                                    <div class="entry-c">
                                           <div class="entry-title">
                                            <h3 class="t600 mb-2"><a href="#" class="text-light">{!!str_limit($item->short_text , 50)!!}</a></h3>
                                            <ul class="entry-meta_omg clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $item->date }}</li>
                                            </ul>
                                        </div>
                                   </div>
                                </div>
                        </div>
                        </div>
                    </div>
                    </div>
                 @endif
               @endforeach
             </div>
            @break
        @case('B')
        {{-- 2 hat mec irar koxqi --}}
        <div  class="container clearfix mt-5 ">
            <?php $limit=0; ?>
                <div class="row">
                        <div class="owl-item  col-lg-12" style="display: contents" >
                                <span class="vert-line1"></span>
                             <span class="vert-line2"></span>
                             <span class="vert-line3"></span>

                            <h3 class="h3_omg" style="color: #0f1841">{{$data['posts_by_menu'][$i]['name']}}</h3>

                            <div class="line line_omg" ></div>
                        </div>
                        @foreach ($data['posts_by_menu'][$i][$k] as $item)
                                <?php $limit++;?>
                                @if ($limit<=2)
                                <div class="owl-item  col-lg-6">
                                     <div class="hov nobottommargin">
                                        <div class="feature-box media-box hov-hi-div-hid">
                                        <div class="entry mb-0 hov-hi-div" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                                            <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" class="own_link">
                                        </a>
                                    </div>
                                    <div class="text-overlay pl-4  hov-hi pr-4 pb-2">
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h3 class="t600 mb-2">
                                                        <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" class="text-light">{!!str_limit($item->short_text , 80)!!}</a></h3>
                                                    <ul class="entry-meta_omg clearfix">
                                                        <li><i class="icon-calendar3"></i> {{ $item->date }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                                    </div>
                                @endif
                        @endforeach
                </div>
       </div>
            @break
            @case('C')
             {{-- 4 hat poqr irar koxqi --}}
                <div class="container clearfix mt-5">
                        <div class="row">

                        <div  class="owl-item  col-lg-12" style="display: contents" >
                                <span class="vert-line1"></span>
                                <span class="vert-line2"></span>
                                <span class="vert-line3"></span>
                <h3 class="h3_omg" style="color: #0f1841">{{$data['posts_by_menu'][$i]['name']}}</h3>
                <div class="line line_omg" ></div>
                         </div>
                    @foreach ($data['posts_by_menu'][$i][$k] as $item)
                        <div class="col_one_fourth nobottommargin hov">
                                <div class="feature-box media-box hov-hi">
                                         <div class="fbox-media">
                                         <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" >
                                            <img src="{{$item->img}}" alt="{{$data['posts_by_menu'][$i]['name']}}">
                                        </a>
                                        </div>

                                    <div class="fbox-desc">
                                       <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" >
                                         <h3>{{$item->title}}</h3>
                                        <p>{!!str_limit($item->short_text , 50)!!} </p>
                                       </a>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
            @break
            @case('D')
            {{-- 3 hat poqr irar koxqi --}}
            <?php $limit=0; ?>
                <div class="container clearfix mt-5">
                        <span class="vert-line1"></span>
                        <span class="vert-line2"></span>
                        <span class="vert-line3"></span>
                <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
                <div class="line line_omg"></div>
                    @foreach ($data['posts_by_menu'][$i][$k] as $item)
                    <?php $limit++; ?>
                    @if ($limit<=3)
                    <div class="col_one_third nobottommargin hov">
                            <div class="feature-box media-box hov-hi">
                                <div class="fbox-media">
                                <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}">
                                     <img src="{{$item->img}}" alt="{{$data['posts_by_menu'][$i]['name']}}">
                                </a>
                                    </div>
                                <div class="fbox-desc">
                                     <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}">
                                        <h3>{{$item->title}}</h3>
                                        <p>{!!str_limit($item->short_text , 50)!!} </p>
                                     </a>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @endforeach
                </div>

            @break
        @default
    @endswitch
@endif
@endfor
@endsection

@section('main_poster')
 @if($data['layout'] === 'four')
 <?php $limit=0;
 ?>

 <div class="col-lg-7 hov nobottommargin main hov-hi-div-hid">
    <a  href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
        <div class="main_four hov-hi-div" style="background-image:url('{{$data['big_post']['img']}}')">
          </div>
    </a>
    <div class="text-overlay pl-4 pr-4 pb-2 hov-hi ">
        <div class="entry-c">
            <div class="entry-title">
                <h3 class="t600 mb-2">
                    <a href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}" class="text-light">{!!str_limit($data['big_post']['title'] , 50)!!}</a></h3>
                <ul class="entry-meta_omg clearfix">
                    <li><i class="icon-calendar3"></i> {{$data['big_post']['date']}}</li>
                </ul>
            </div>
        </div>
    </div>
           {{-- <div class="feature-box media-box" style="position: absolute; bottom: 18px; left: 20px">
               <div class="fbox-desc hov-hi">
                    <h4 class="own-h4">
                  <a href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
                   {{$data['big_post']['title']}}<br/>
                   {!!str_limit($data['big_post']['short_text'] , 50)!!}
                  </a>
                    </h4>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"> </i> {{$data['big_post']['date']}}</li>
                    </ul>
                </div>
            </div> --}}

    </div>


    <div class="col-lg-5 mt-5-own">
        @for ($i = 0; $i < count($data['small_post']); $i++)
        <?php $limit++;?>
        @if ($limit<=3)
        <div class="ipost clearfix hov">
        <div class="col_half" style="{{$limit===1?'margin:0':'margin:10px 0 0 0' }}">
                    <div class="entry-image_omg" style="overflow: hidden">
                            <a  class="own-link-a{{$data['small_post'][$i]->id}}"
                                    href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}">

                            <img  class="image_fade" src="{{$data['small_post'][$i]->img}}" alt="image" style="opacity: 1">
                            </a>
                    </div>
                </div>
                <div class="col_half bottommargin-sm col_last hov-hi">
                    <div class="entry-title">
                    <h3><a href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}">{!!str_limit($data['small_post'][$i]->title, 50)!!}</a></h3>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> {{$data['small_post'][$i]->date}}</li>
                    </ul>

                </div>
            </div>

            @endif
        @endfor



    </div>


 @else
 {{-- <div class="owl-item  col-lg-12" >
        <h3 class="h3_omg">Armenia 2</h3>
        <div class="line line_omg"></div>
    </div> --}}
<div class="col-lg-6 nobottommargin hov ">
       <div class="feature-box media-box hov-hi ">
           <div class="fbox-media">
                <a href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
               <img  src="{{$data['big_post']['img']}}" alt="image" class="image_fade"></a>
           </div>
           <div class="poster-main-text">
           <div class="text-overlay pl-4 pr-4 pb-2 hov-hi">
                <div class="entry-c">
                       <div class="entry-title">
                        <h3 class="t600 mb-2">
                            <a href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}"class="text-light"> {!!str_limit($data['big_post']['title'] , 50)!!}</a></h3>
                        <ul class="entry-meta_omg clearfix">
                            <li><i class="icon-calendar3"></i> {{$data['big_post']['date']}}</li>
                        </ul>
                    </div>
               </div>
            </div>
        </div>
           {{-- <div class="fbox-desc fbox_omg">
                {{-- <h3>{{$data['big_post']['title']}}</h3>
                <h4 class="own-h4">
                <a    href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}" class="text-light">
                            {!!str_limit($data['big_post']['short_text'] , 50)!!}
                </a>
                </h4>
               <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{$data['big_post']['date']}}</li>

               </ul>
           </div> --}}
       </div>
</div>

<div class="col-lg-6 nobottommargin col_last">
        <ul class="clients-grid grid-2 nobottommargin clearfix">
           @for ($i = 0; $i < count($data['small_post']); $i++)
                <li  class="nobottommargin hov">
                    <div class="feature-box media-box own">
                        <div class="fbox-media" >
                            <div class="text-overlay_omg hov-hi">
                                <div class="entry-c">
                                    <div class="entry-title">
                                            <a href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}" >
                                                    <h5 class="t700 mb-2">{!!str_limit($data['small_post'][$i]->short_text, 50)!!}</h5>
                                                </a>
                                        <ul class="entry-meta_omg clearfix">
                                            <li><i class="icon-calendar3"></i> {{$data['small_post'][$i]->date}}</li>
                                        </ul>

                                    </div>


                                </div>
                            </div>
                            <a href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}" >

                       <img src="{{$data['small_post'][$i]->img}}" alt="image" >
                            </a>
                    </div>
                    </div>
                </li>
            @endfor
        </ul>
</div>

 @endif
 @endsection
