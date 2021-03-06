@extends('layouts.archieve')
@section('arch_posts')

 <div class="postcontent nobottommargin">
        <div  class="owl-item  col-lg-12 category_own" style="display: contents" >
                <div style= "display:flex;margin-bottom: 29px;">
                    <div style= "display:flex;width: 100%;">
                        <span class="vert-line1" style="margin: 0 2px 0"></span>
                        <span class="vert-line2"></span>
                        <span class="vert-line3"></span>
                        <h3 class="h3_omg" style="color: #0f1841;white-space: nowrap;">{{ trueFormat($data['date'])}}
                        </h3>
                        <div class="line line_omg" ></div>
                    </div>
                </div>
            </div>

    <div class="infinite-scroll">
        <?php $i=0;?>
 @foreach ($data['posts_archieve'] as $item)

    <div class="col_one_third hov bottommargin height-317px">
        <div class="feature-box media-box hov-hi">
            <div class="fbox-media">
         <a href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}">
                      <img  src="{{$item->img}}" alt="image"  class="image_fade">
         </a>
                    </div>
            <div class="fbox-desc">
              <a   href="{{url(app()->getLocale().'/posts/'.$item->unique_id.'/'.urlencode($item->title))}}">
                <h3>{{$item->title}}</h3>
                <p>{!!str_limit($item->short_text , 80)!!} </p>
              </a>
                <ul class="entry-meta clearfix">
                    <li><i class="icon-calendar3"> </i> {{ trueFormat($item->date) }}</li>
                </ul>
            </div>
        </div>
    </div>
 @endforeach
  {{$data['posts_archieve']->links()}}
</div>




</div>
{{-- <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#" class="active">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
      </div>
<div class="pagination">
        {{$data['posts']->links()}}
</div> --}}

@endsection
