@extends('admin.layouts.admin')

@section('title', 'Languages')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="lang-list-section card">
    <h3 class="card-header text-secondary">Language Management</h3>

    <div class="container">
        <div class="row card-body justify-content-end">
            <h5 style="margin-top:8px;">Click the button to create a new Language.</h5>
            <div class="col-5">
                <a role="button" class="btn btn-outline-primary" href="{{ route('admin.lang.create', app()->getLocale()) }}" target="_blank">
                    <i class="fas fa-plus-circle mr-1"></i>Create New
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive-md">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name's Root</th>
                        <th scope="col">Language Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                @forelse ($langs as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->lng}}</td>
                        <td>{{$item->lng_root}}</td>
                        <td>{{$item->lng_name}}</td>
                        <td>

                        <form action="{{ route('admin.lang.destroy', ['locale' => app()->getLocale(), $item ] )}}" method="POST"
                                onsubmit="if(confirm('Are you shure you want to delete it?')){ return true } else {return false}">
                                @csrf
                                {{ method_field('DELETE') }}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a role="button" class="btn btn-primary" id="cat-edit" href="{{route('admin.lang.edit',['locale' => app()->getLocale(),$item])}}" target="_blank"><i class="fas fa-pen-alt mr-1"></i>Edit</a>
                                <button role="button" type="submit" class="btn btn-danger" id="cat-delete"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                            </div>
                        </form>
                        </td>
                    </tr>
                @empty

                @endforelse

                </tbody>
            </table>
        </div>
    </div> <!-- div class="card-body" -->

</div>

@endsection
