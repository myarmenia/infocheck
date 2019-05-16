@extends('admin.layouts.admin')

@section('title', 'Posts')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

{{-- @include('admin.common.errors') --}}
<!-- here Errors and imgDebug -->
@include('admin.common.imgMessages')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="container">
    <div class="question-notfound-section card">
        <h3 class="card-header bg-warning">Reply Warning!</h3>

        <div class="card-body">
            <p>

                Question with ID='{{$q_id}}' and lang='{{$locale}}' alerady Replied!<br>
                Please, check the ID of Question which you want to reply. <br>
                Or insert correct params from URL.
            </p>
        </div>
        <div class="card-footer bg-dark">
            <a href="{{route('admin.question.index', ['locale'=>$locale])}}" class="btn btn-warning border">
                Question Management
            </a>
        </div>
    </div>
</div>


@endsection
