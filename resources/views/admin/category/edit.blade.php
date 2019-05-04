@extends('admin.layouts.admin')

@section('title', 'Categories - Edit')

@section('lang_menu')
{{-- @include('admin.includes.menu', $langs) --}}
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.success')

{{-- {{ dump($category)}} --}}
{{-- {{dump($langs)}} $lng_name --}}
{{-- {{dump($postlayouts)}} --}}
<div class="text-left">
    <em>
        <a href="{{ route('admin.category.index', app()->getLocale())}}">Category</a>
        /Edit</em>
</div>
<div class="card">
    <h3 class="card-header">Edit Category N {{$category->id}}</h3>


    <form class="py-3 px-5" action="{{ route('admin.category.update',['locale'=>app()->getLocale(), $category] ) }}" method="POST">
        @csrf
        {{ method_field('put') }}
        <div class="cart-body">
            <div class="form-group row">
                <label for="edit-cat-id" class="col-sm-3 col-form-label col-form-label-lg">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit-cat-id" value="{{$category->id}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="edit-cat-lng-name" class="col-sm-3 col-form-label col-form-label-lg">Language</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit-cat-lng-name" value="{{$lng_name}}" disabled>
                </div>
            </div>


            <div class="form-group row">
                <label for="edit-cat-position" class="col-sm-3 col-form-label col-form-label-lg">Position</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit-cat-position" value="{{$category->position}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="edit-cat-name" class="col-sm-3 col-form-label col-form-label-lg" >Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="edit-cat-name" value="{{$category->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="edit-cat-name" class="col-sm-3 col-form-label col-form-label-lg" >Status</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="status" id="edit-cat-name" value="{{$category->status}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-6 col-form-label col-form-label-lg" >Posts Design Of This Category On Main Page (layout)</label>
                @foreach ($postlayouts as $playout)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout" id="pl_{{$playout->id}}" value="{{$playout->class_name}}"
                        @if ($category->layout === $playout->class_name)
                            checked
                        @endif>
                        <label class="form-check-label" for="pl_{{$playout->id}}">{{$playout->class_name}}</label>
                    </div>
                @endforeach
            </div>

            <hr/>
            <input name="id" type="text" value="{{ $category->id }}" hidden>
            <button type="submit" class="btn btn-outline-dark btn-lg" >Update Category</button>

        </div><!-- End od card-body -->
    </form>

<div class="card-footer">
    <div class="alert alert-info" role="alert">
    Here you can change Name, Status of current Category and design (layout) for posts on Main page of this Category-group!
    </div>
</div>
</div>
@endsection
