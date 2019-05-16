@extends('admin.layouts.admin')

@section('title', 'Comments')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="comment-list-section card">
    <h3 class="card-header">Comment Management</h3>

    <div class="card-body">
        <div class="table-responsive-md">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Body</th>
                        <th scope="col">Post ID</th>
                        <th scope="col">Approved</th>
                        <th scope="col">User</th>
                        <th scope="col">Lang</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>
                            <textarea name="c_body" id="c_body" rows="1"  class="form-control" readonly>{{$item->body}}</textarea>
                        </td>

                        <td>{{$item->post->id}}</td>
                        @if ($item->approved)
                            <td class="bg-success"><strong>{{$item->approved}}</strong></td>
                        @else
                            <td class="bg-danger"><strong>{{$item->approved}}</strong></td>
                        @endif
                        <td>{{$item->user->email}}</td>
                        <td>{{$item->lang->lng}}</td>
                        <td>
                            <form action="{{route('admin.comment.changeStatus', app()->getLocale() )}}" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{$item->id}}" hidden>
                                @if ($item->approved)
                                    <input type="text" name="approved" value="0" hidden>
                                    <button type="submit" class="btn btn-outline-danger">Hide</button>
                                @else
                                    <input type="text" name="approved" value="1" hidden>
                                    <button type="submit" class="btn btn-outline-primary">Show</button>
                                @endif

                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-info"></div>
                        </td>
                    </tr>

                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="text-center">{{$comments->links() }}</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div> <!-- class="card-body" -->
</div>

@endsection
