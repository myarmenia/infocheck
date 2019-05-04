@extends('admin.layouts.admin')

@section('title', 'Posts')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.success')

<div class="posts-list-section card">

    <h3 class="py-3 text-secondary card-header">Posts Management</h3>
    <div class="container">
        <div class="row card-body justify-content-end">
            <h5 style="margin-top:8px;">Click the button to create a new Post.</h5>
            <div class="col-4">
            <a role="button" class="btn btn-outline-primary" href="{{ route('admin.post.create', app()->getLocale()) }}" target="_blank">Create New</a>
            </div>
        </div>
    </div>

    <div class="card-body">
            <div class="table-responsive-md">
            <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr >
                            <th scope="col" class="align-middle"><u>ID</u> </br>{{app()->getLocale()}}</th>
                            <th scope="col" class="align-middle"><u>Unique ID</u></br>multilang</th>
                            <th scope="col" class="align-middle">Title</th>
                            <th scope="col" class="align-middle">Category</th>
                            <th scope="col" class="align-middle">Status</th>
                            <th scope="col" class="align-middle">Is Answer</th>
                            <th scope="col" class="align-middle">Date</th>
                            <th scope="col" class="align-middle">Viewed</th>
                            <th scope="col" class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $item)
                        <tr>

                            <th scope="row">{{$item->id}}</th>
                            <th scope="row">{{$item->unique_id}}</th>
                            <td class="post-list-title-td">{{$item->title}}</td>
                            <td>{{$item['getCategory']->name}}</td>
                            <td>
                                <!-- post can be unpublished | published | main (for poster on Main page) -->
                                @switch($item->status)
                                    @case('unpublished')
                                        <div class="bg-danger text-white"><strong>{{$item->status}}</strong></div>
                                        @break
                                    @case('main')
                                    <div class="bg-success text-white"><strong>{{$item->status}}</strong></div>
                                        @break
                                    @default
                                    {{$item->status}}
                                @endswitch
                            </td>
                            <td>
                                <!-- Is Post answer for any Qoestion ? -->
                                @if ($item->questions()->exists())
                                <div class="bg-warning">true</div>
                                @else
                                <div class="bg-light">false</div>
                                @endif
                            </td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->view}}</td>
                            <td>
                                <!-- Actions: show | edit-update | delete -->
                                <div class="btn-group" role="group">
                                    <form action="{{route('admin.post.destroy', ['locale'=>app()->getLocale(), $item ])}}" method="POST"
                                    onsubmit="return confirm('Do you really want to delete It?')? true : false">
                                        @csrf
                                        @method('DELETE')

                                        @if (app\Post::where('unique_id', $item->unique_id)->count() !== count($langs))
                                        <!-- Translate button -->
                                            <a href="{{route('admin.post.translate', ['locale'=> app()->getLocale(),'id'=>$item->id])}}"
                                                class="btn btn-outline-primary px-1" role="button" title="translate">
                                                <i class="fas fa-globe"></i>
                                            </a>
                                        @endif
                                        <a href="" class="btn btn-outline-primary px-1" role="button">
                                            <i class="fas fa-paperclip"></i>
                                            <i class="far fa-comments"></i>
                                            @if ($item->questions()->exists())
                                            <i class="far fa-question-circle"></i>
                                            @endif
                                        </a>
                                        <a href="" class="btn btn-outline-primary px-2" role="button">
                                            <i class="fas fa-pen-nib"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger px-2" role="button"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                            <!-- This section is work, when for some language no data in DB. -->
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-info">
                                        No data to show.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
            </table>
            </div>
    </div>
</div>


@endsection
