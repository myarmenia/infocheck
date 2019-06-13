@extends('admin.layouts.admin')

@section('title', 'Languages')

@section('lang_menu')
@include('admin.includes.menu2', ['langs'=> $langs])
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="text-left">
    <em>
        <a href="{{ route('admin.lang.index', app()->getLocale())}}">Languages</a>
        /Edit
    </em>
</div>


<div class="card">
        <h3 class="card-header">Edit Language №{{$current->id}}</h3>

        <form class="py-3 px-5" action="{{ route('admin.lang.update',['locale'=>app()->getLocale(), $current] ) }}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="cart-body">
                    <div class="form-group row">
                        <label for="lang-edit-id" class="col-sm-3 col-form-label col-form-label-lg">ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control" id="lang-edit-id" value="{{$current->id}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lang-edit-lng" class="col-sm-3 col-form-label col-form-label-lg">Code (lng)</label>
                        <div class="col-sm-9">
                            <input type="text" name="lng" class="form-control" id="lang-edit-lng" value="{{$current->lng}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lang-edit-lng_root" class="col-sm-3 col-form-label col-form-label-lg">Name's Root</label>
                        <div class="col-sm-9">
                            <input type="text" name="lng_root" class="form-control" id="lang-edit-lng_root" value="{{$current->lng_root}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lang-edit-lng_name" class="col-sm-3 col-form-label col-form-label-lg">Language Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="lng_name" class="form-control" id="lang-edit-lng_name" value="{{$current->lng_name}}" >
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-outline-dark btn-lg" >Update Current Language</button>
                </div>

        </form>
</div>


edit lang
@endsection
