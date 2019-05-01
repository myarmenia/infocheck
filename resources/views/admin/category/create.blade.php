@extends('admin.layouts.admin')

@section('title', 'Categories - Create')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.success')

{{-- {{$langs}} --}}
<div class="text-left">
        <em>
            <a href="{{ route('admin.category.index', app()->getLocale())}}">Category</a>
            /Create</em>
    </div>

<div class="create-new-category">
    <div class="card">
        {{-- <div ></div> --}}
        <h3 class="card-header">Create new Item</h3>
        <div class="card-body">

                <div class="alert alert-success" role="alert" id="cat_create_alert_success">
                    New Menu-item was successfuly created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger" role="alert" id="cat_create_alert_danger">
                    Woops! Menu-item was not created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-warning" role="alert" id="cat_create_alert_warning">
                    Warning! The name of Menu-item already exists.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



            <ul class="nav nav-tabs" id="langTab" role="tablist">
                @foreach ($langs as $item)
                @if ($loop->first)
                    {{-- This is the first iteration --}}
                    <li class="nav-item">
                        <a class="nav-link active" id="{{$item->lng}}-tab" data-toggle="tab" href="#{{$item->lng_name}}" role="tab" aria-controls="{{$item->lng}}" aria-selected="true">
                            {{$item->lng}}
                        </a>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" id="{{$item->lng}}-tab" data-toggle="tab" href="#{{$item->lng_name}}" role="tab" aria-controls="{{$item->lng}}" aria-selected="false">
                        {{$item->lng}}
                    </a>
                </li>
                @endif





                @endforeach
                {{-- <li class="nav-item">
                    <a class="nav-link active" id="am-tab" data-toggle="tab" href="#Armenian" role="tab" aria-controls="am" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#English" role="tab" aria-controls="en" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ru-tab" data-toggle="tab" href="#Russian" role="tab" aria-controls="ru" aria-selected="false">Contact</a>
                </li> --}}
            </ul>

            <div class="tab-content" id="langTabContent">
                {{-- <form action="#"></form> --}}
                    @csrf
                @foreach ($langs as $item)
                @if ($loop->first)
                    {{-- This is the first iteration: separated for show as ACTIVE(clicked) --}}
                    <div class="tab-pane fade show active" id="{{$item->lng_name}}" role="tabpanel" aria-labelledby="{{$item->lng}}-tab">
                        {{$item->lng_name}} Content

                        <div class="form-group row">
                            <label for="create-cat-name{{$item->id}}" class="col-sm-3 col-form-label col-form-label-lg text-left">Category Name</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control" id="edit-cat-lng-name" value="{{$lng_name}}" disabled> --}}
                                <input type="text" name="name{{$item->id}}" data-lang-id="{{$item->id}}" id="create-cat-name{{$item->id}}" class="form-control new-cat" placeholder="Name in {{$item->lng_name}}">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-pane fade" id="{{$item->lng_name}}" role="tabpanel" aria-labelledby="{{$item->lng}}-tab">
                        {{$item->lng_name}} Content

                        <div class="form-group row">
                            <label for="create-cat-name{{$item->id}}" class="col-sm-3 col-form-label col-form-label-lg text-left">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name{{$item->id}}" data-lang-id="{{$item->id}}" id="create-cat-name{{$item->id}}" class="form-control new-cat" placeholder="Name in {{$item->lng_name}}">
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label col-form-label-lg text-left">Item ID (autoset)</label>
                        <div class="col-sm-9">
                            <input type="text" name="item_id"  class="form-control new-cat" value="{{$new_item_id}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label col-form-label-lg text-left">Position (autoset)</label>
                        <div class="col-sm-9">
                            <input type="text" name="position"  class="form-control new-cat" value="{{$new_position}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label col-form-label-lg text-left">Posts Design Of This Category On Main Page</label>
                        <div class="col-sm-6">
                            <select name="layout" id="cat-create-layout" class="form-control new-cat">
                                @foreach ($postlayouts as $playout)
                                    <option value="{{$playout->class_name}}">{{$playout->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <!-- id="langTabContent" -->

                {{-- <div class="tab-content" id="langTabContent">
                <div class="tab-pane fade show active" id="Armenian" role="tabpanel" aria-labelledby="am-tab">Home</div>
                <div class="tab-pane fade" id="English" role="tabpanel" aria-labelledby="en-tab">Profile</div>
                <div class="tab-pane fade" id="Russian" role="tabpanel" aria-labelledby="ru-tab">Contact</div>
                </div> --}}
        </div>
        <!-- .card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-outline-dark btn-lg" id="create_category">Create</button>
        </div>

    </div>
    <!-- .card -->


</div>

@endsection
