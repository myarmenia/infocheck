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
                            <div class="owl-item  col-lg-12" >
                                  <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
                                  <div class="line line_omg"></div>
                                      </div>
                 @foreach ($data['posts_by_menu'][$i][$k] as $item)
                 <?php $limit++;?>
                 @if ($limit<=3)
                 <div class="owl-item col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <article class="entry mb-0" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                            <div class="text-overlay pl-4 pr-4 pb-2">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h3 class="t600 mb-2"><a href="#" class="text-light">{!!str_limit($item->short_text , 50)!!}</a></h3>
                                        <ul class="entry-meta_omg clearfix">
                                            <li><i class="icon-calendar3"></i> {{ $item->date }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                 @else
                </div>
                 <div class="row clearfix">
                        <div class="owl-item col-lg-12" >
                            <article class="entry mb-0" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                                <div class="text-overlay pl-4 pr-4 pb-2">
                                    <div class="entry-c">
                                           <div class="entry-title">
                                            <h3 class="t600 mb-2"><a href="#" class="text-light">{!!str_limit($item->short_text , 50)!!}</a></h3>
                                            <ul class="entry-meta_omg clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $item->date }}</li>
                                            </ul>
                                        </div>
                                   </div>
                                </div>
                            </article>
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
                        <div class="owl-item  col-lg-12" >
                            <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
                            <div class="line line_omg"></div>
                        </div>
                        @foreach ($data['posts_by_menu'][$i][$k] as $item)
                                <?php $limit++;?>
                                @if ($limit<=2)
                                <div class="owl-item  col-lg-6">
                                        <div class="entry mb-0" style="background: url('{{$item->img}}') center center; background-size: cover; height: 400px;">
                                            <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}" class="own_link">
                                                 <div class="text-overlay pl-4 pr-4 pb-2">
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
                                        </a>
                                        </article>

                                    </div>
                                @endif
                        @endforeach
                </div>
       </div>
            @break
            @case('C')
             {{-- 4 hat poqr irar koxqi --}}
                <div class="container clearfix mt-5">
                <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
                <div class="line line_omg"></div>
                    @foreach ($data['posts_by_menu'][$i][$k] as $item)
                        <div class="col_one_fourth nobottommargin">
                                <div class="feature-box media-box">
                                    <div class="fbox-media">
                                        <img src="{{$item->img}}" alt="{{$data['posts_by_menu'][$i]['name']}}">
                                    </div>
                                    <div class="fbox-desc">
                                        <h3>{{$item->title}}</h3>
                                        <p>{!!str_limit($item->short_text , 50)!!} </p>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @break
            @case('D')
            {{-- 3 hat poqr irar koxqi --}}
            <?php $limit=0; ?>
                <div class="container clearfix mt-5">
                <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
                <div class="line line_omg"></div>
                    @foreach ($data['posts_by_menu'][$i][$k] as $item)
                    <?php $limit++; ?>
                    @if ($limit<=3)
                    <div class="col_one_third nobottommargin">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <img src="{{$item->img}}" alt="{{$data['posts_by_menu'][$i]['name']}}">
                                </div>
                                <div class="fbox-desc">
                                    <h3>{{$item->title}}</h3>
                                    <p>{!!str_limit($item->short_text , 50)!!} </p>
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
 <div class="col-lg-7">
        <div class="nobottommargin">
            <div class="feature-box media-box">
                <div class="fbox-media">
                        <a  href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
                    <img  id="{{$data['big_post']['id']}}" class="image_fade" src="{{$data['big_post']['img']}}" alt="image">
                        </a>
                </div>
                <div class="fbox-desc">
                    <h4 class="own-h4" >
                  <a class="own-link-a{{$data['big_post']['id']}}" href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
                   {{$data['big_post']['title']}}<br/>
                   {!!str_limit($data['big_post']['short_text'] , 50)!!}
                  </a>
                    </h4>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"> </i> {{$data['big_post']['date']}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-5">
        @for ($i = 0; $i < count($data['small_post']); $i++)
        <?php $limit++;?>
        @if ($limit<=3)
        <div class="ipost clearfix">
                <div class="col_half bottommargin-sm">
                    <div class="entry-image_omg">
                            <a  class="own-link-a{{$data['small_post'][$i]->id}}"
                                    href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}">

                            <img id="{{$data['small_post'][$i]->id}}" class="image_fade" src="{{$data['small_post'][$i]->img}}" alt="image" style="opacity: 1">
                            </a>
                    </div>
                </div>
                <div class="col_half bottommargin-sm col_last">
                    <div class="entry-title">
                    <h3><a  class="own-link-a{{$data['small_post'][$i]->id}}"
                            href="{{url(app()->getLocale().'/posts/'.$data['small_post'][$i]->unique_id.'/'.urlencode($data['small_post'][$i]->title))}}">{!!str_limit($data['small_post'][$i]->short_text, 50)!!}</a></h3>
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
<div class="col-lg-6 nobottommargin">
       <div class="feature-box media-box">
           <div class="fbox-media">
                <a href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}">
               <img id="{{$data['big_post']['id']}}" src="{{$data['big_post']['img']}}" alt="image" class="image_fade"></a>
           </div>
           <div class="fbox-desc fbox_omg">
                {{-- <h3>{{$data['big_post']['title']}}</h3> --}}
                <h4 class="own-h4">
                <a  class="own-link-a{{$data['big_post']['id']}}"  href="{{url(app()->getLocale().'/posts/'.$data['big_post']['unique_id'].'/'.urlencode($data['big_post']['title']))}}" class="text-light">
                            {!!str_limit($data['big_post']['short_text'] , 50)!!}
                </a>
                </h4>
               <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{$data['big_post']['date']}}</li>

               </ul>
           </div>
       </div>
</div>

<div class="col-lg-6 nobottommargin col_last">
        <ul class="clients-grid grid-2 nobottommargin clearfix">
           @for ($i = 0; $i < count($data['small_post']); $i++)
                <li>
                    <div class="feature-box media-box">
                        <div class="fbox-media" >
                            <div class="text-overlay_omg">
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
                       <img src="{{$data['small_post'][$i]->img}}" alt="image"  >

                    </div>
                    </div>
                </li>
            @endfor
        </ul>
</div>

 @endif
 @endsection
