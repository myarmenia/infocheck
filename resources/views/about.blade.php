@extends('layouts.about')
@section('about')
<h3>{{trans('text.about_us')}}</h3>

{!!$data['body'][0]['html_code']!!}

@endsection
