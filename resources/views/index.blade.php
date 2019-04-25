@extends('layouts.index')
@section('posts_by_cat')

@for ($i = 0; $i <count($data['posts_by_menu']); $i++)
  <?php
       $k=$data['id'][$i];
       //echo $k;
       //die();


   ?>
   @if (count($data['posts_by_menu'][$i][$k])>0 )
   @if ($i%2 !== 0)
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
                            <p>{!!str_limit($item->short_text , 80)!!} </p>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
   @else
   <?php $count=0;?>
    <div class="container clearfix mt-5">
        <h3 class="h3_omg">{{$data['posts_by_menu'][$i]['name']}}</h3>
        <div class="line line_omg"></div>
        @foreach ($data['posts_by_menu'][$i][$k] as $item)
           <?php $count++;?>
            @if ($count<=3)
            <div class="col_one_third nobottommargin">
                <div class="feature-box media-box">
                <div class="fbox-media">
                <img src="{{$item->img}}" alt="{{$data['posts_by_menu'][$i]['name']}}">
                </div>
                <div class="fbox-desc">
                <h3>{{$item->title}}</h3>
                <p>{!!str_limit($item->short_text , 80)!!} </p>
                <ul class="entry-meta clearfix">
                <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
                </ul>
                </div>
                </div>
                </div>
            @endif
        @endforeach
    </div>
   @endif
@endif
@endfor
@endsection
