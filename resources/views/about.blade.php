@extends('layouts.about')
@section('about')
@if (count($data['body'])>0)
    <h3>{{trans('text.about_us')}}</h3>
    {!!$data['body'][0]['html_code']!!}
    @else
    {{ trans('text.no_post') }}
@endif
@endsection
