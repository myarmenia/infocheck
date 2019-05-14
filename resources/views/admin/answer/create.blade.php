@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
{{-- @include('admin.includes.menu', ['langs'=> $langs]) --}}
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')


<div class="text-left">
    <em>
        <a href="{{ route('admin.answer.create', app()->getLocale())}}">Answers</a>
        /{{$last_id}}/Create
    </em>
</div>

<div class="card">
    <h3 class="card-header">Create Answer for Questio №-{{$q_id}}</h3>

    <div class="card-body">
        <form action="{{route('admin.answer.store', app()->getLocale())}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="ans-create-id" class="col-sm-3 col-form-label col-form-label-lg">Answer ID</label>
                <div class="col-sm-9">
                    <input type="text" name="id" class="form-control" id="ans-create-id" value="{{$last_id}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="ans-create-text" class="col-sm-3 col-form-label col-form-label-lg">Answer Body</label>
                <div class="col-sm-9">
                    <textarea name="body" id="ans-create-text" cols="30" rows="5" class="form-control">Put the asnwer's text here...</textarea>
                </div>
            </div>

            <hr>
            <input type="text" name="q_id" value="{{$q_id}}" hidden>
            <button type="submit" class="btn btn-outline-success btn-lg" >Create</button>
        </form>
    </div>
</div>

@endsection
