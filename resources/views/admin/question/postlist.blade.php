@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
@include('admin.includes.menu2',['langs'=>$langs, 'id' => $q_id] )
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="text-left">
    <em>
        <a href="{{ route('admin.question.index', app()->getLocale())}}">Questions</a>
        /{{$q_id}}-{{$q_lng}}/Posts
    </em>
</div>

    <div class="question-postlist-section card">
        <h3 class="card-header">Reply Question №-{{$q_id}} by Post from list or
            <div class="btn-group">
                <a href="{{route('admin.post.create',['locale'=>app()->getLocale(), 'q_id'=>$q_id])}}" role="button" class="btn btn-outline-secondary" target="_blank">
                    <strong>Create new</strong>
                </a>
            </div>
        </h3>

        <div class="table-responsive-md">

                <table class="table table-bordered" id="replyPostTable">
                    <thead class="thead-dark">
                        <tr>
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
                                <!-- Actions: Reply -->
                                <div class="btn-group" role="group">

                                    <form action="{{route( 'admin.question.post.reply',app()->getLocale() )}}" method="POST" ">
                                        @csrf
                                        <input type="text" name="post_id" value="{{$item->id}}" hidden>
                                        <input type="text" name="quest_id" value="{{$q_id}}" hidden>
                                        <!-- If Post has Question show disabled button -->
                                        @if ($item->questions()->exists())
                                            <button disabled="disabled" class="btn btn-secondary px-2 border border-secondary">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-info px-2">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                        @endif

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
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                {{$posts->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>





    </div><!-- end card -->


@endsection
