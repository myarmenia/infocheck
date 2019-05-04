@extends('admin.layouts.admin')

@section('title', 'Posts')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.success')

<div class="text-left">
    <em>
        <a href="{{ route('admin.post.index', app()->getLocale())}}">Posts</a>
        /Create</em>
</div>

<div class="create-post-section card">
    <h3 class="card-header">Create new Post N-{{$last_id}}</h3>
    <div class="card-body">
        <form action="{{route('admin.document.uploadimage', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="create-post-imgs-upload d-flex flex-row rounded border border-success py-2">

                <div class="btn-group">
                    <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-light">
                    <input type="text" hidden name="post_id" value="{{$last_id}}">
                    <input type="text" hidden name="folder_name" id="" value="{{$folder_name}}">
                </div>
                <div class="btn-group ml-3">
                    <button type="submit" class="btn btn-success">Upload Images</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
