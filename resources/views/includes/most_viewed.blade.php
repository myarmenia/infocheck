<h4 class="highlight-me">{{trans('text.most_veiwed')}}
</h4>
@for ($i = 0; $i < count($data['most_viewed']); $i++)
<div id="post-list-footer">
    <div class="spost clearfix">
        <a href="{{url(app()->getLocale().'/posts/'.$data['most_viewed'][$i]['unique_id'].'/'.urlencode($data['most_viewed'][$i]['title']))}}" class="nobg">
        <div class="entry-image" style="background-image: url({{ $data['most_viewed'][$i]->img}});background-size: cover; margin-bottom: 10px">
        </div>
        </a>
        <div class="entry-c">
        <div class="entry-title">
        <h4><a href="{{url(app()->getLocale().'/posts/'.$data['most_viewed'][$i]['unique_id'].'/'.urlencode($data['most_viewed'][$i]['title']))}}">{!!str_limit($data['most_viewed'][$i]->short_text, 50)!!}</a></h4>
        </div>
        <ul class="entry-meta" style="margin-top:0">
            <li><i class="icon-calendar3"></i> {{ $data['most_viewed'][$i]->date}}</li>
        </ul>
        </div>
    </div>
</div>

@endfor


