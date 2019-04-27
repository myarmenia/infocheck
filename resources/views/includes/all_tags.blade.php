<h4>{{ trans('text.tags') }}</h4>

    <div class="tagcloud">
            @for ($i = 0; $i < count($data['load_all_tags']); $i++)
            <a href="#">{{$data['load_all_tags'][$i]->name}}</a>
            @endfor

    </div>
