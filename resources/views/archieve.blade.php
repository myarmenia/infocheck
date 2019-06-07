@extends('layouts.archieve')
@section('arch_posts')

 <div class="postcontent nobottommargin">
<h3 class="h3_omg">{{$data['date']}}</h3>
    <div class="line line_omg_post"></div>
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
                    <li><i class="icon-calendar3"> </i> {{ $item->date }}</li>
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
