@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="about-section card">
    <h3 class="card-header text-secondary">About Us Management</h3>

    <div class="card-body">









        <div class="table-responsive-md">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Body</th>
                        <th scope="col">lang</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td style="width:50%"> <textarea cols="80" rows="5">{{$item->html_code}}</textarea></td>
                            <td>{{$item->lang->lng}}</td>
                            <td>
                                    <div class="btn-group" role="group">
                                <a href="{{route('admin.about.edit', ['locale' => app()->getLocale(), $item])}}" class="btn btn-outline-primary btn-lg" role="button">
                                    <i class="fas fa-pen-nib"></i> Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- card-body -->
</div>


@endsection
