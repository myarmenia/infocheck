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
                        {{$item->lng_name}} Content Սարո

                        <div class="form-group row">
                            <label for="create-cat-name{{$item->id}}" class="col-sm-3 col-form-label col-form-label-lg text-left">Category Name</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control" id="edit-cat-lng-name" value="{{$lng_name}}" disabled> --}}
                                <input type="text" name="name{{$item->id}}" data-lang-id="{{$item->id}}" id="create-cat-name{{$item->id}}" class="form-control new-cat" placeholder="Name in {{$item->lng_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label col-form-label-lg text-left" for="create-cat-status">Status (autoset)</label>
                            <div class="col-sm-9">
                            {{-- <input type="text" name="status{{$item->id}}" data-status="status{{$item->id}}"  class="form-control new-cat" value="1" > --}}
                            <select name="status{{$item->id}}" data-status="status{{$item->id}}" class="form-control new-cat" id="create-cat-status">
                                <option value="1" selected>show</option>
                                <option value="0">hide</option>
                            </select>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-pane fade" id="{{$item->lng_name}}" role="tabpanel" aria-labelledby="{{$item->lng}}-tab">
                        {{$item->lng_name}} Content Саро Saro

                        <div class="form-group row">
                            <label for="create-cat-name{{$item->id}}" class="col-sm-3 col-form-label col-form-label-lg text-left">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name{{$item->id}}" data-lang-id="{{$item->id}}" id="create-cat-name{{$item->id}}" class="form-control new-cat" placeholder="Name in {{$item->lng_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label col-form-label-lg text-left">Status (autoset)</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" name="status{{$item->id}}"  data-status="status{{$item->id}}" class="form-control new-cat" value="1" > --}}
                                <select name="status{{$item->id}}" data-status="status{{$item->id}}" class="form-control new-cat" id="create-cat-status">
                                    <option value="1" selected>show</option>
                                    <option value="0">hide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
                <hr/>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label col-form-label-lg text-left">Item ID (autoset)</label>
                        <div class="col-sm-9">
                            <input type="text" name="item_id"  class="form-control new-cat" value="{{$new_item_id}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label col-form-label-lg text-left">Position (autoset)</label>
                        <div class="col-sm-9">
                            <input type="text" name="position"  class="form-control new-cat" value="{{$new_position}}" >
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-7 col-form-label col-form-label-lg text-left">Posts Design Of This Category-Group On Main Page (layout)</label>
                        <div class="col-sm-5">
                            <select name="layout" id="cat-create-layout" class="form-control new-cat">
                                @foreach ($postlayouts as $playout)
                                    <option value="{{$playout->class_name}}">{{$playout->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/storage/postclasses/A.png')}}" class="card-img-top" alt="A.png">
                            <div class="card-body">
                                <h4 class="card-text">class A</h4>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/storage/postclasses/B.png')}}" class="card-img-top" alt="B.png">
                            <div class="card-body">
                                <h4 class="card-text">class B</h4>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/storage/postclasses/C.png')}}" class="card-img-top" alt="C.png">
                            <div class="card-body">
                                <h4 class="card-text">class C</h4>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/storage/postclasses/D.png')}}" class="card-img-top" alt="D.png">
                            <div class="card-body">
                                <h4 class="card-text">class D</h4>
                            </div>
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

    <div class="alert alert-info my-3" role="alert">
        If you want to create translation for exists Item, please, replace "item ID", "Position" and "Layout".
    </div>

</div>

@endsection
