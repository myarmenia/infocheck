@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
@include('admin.includes.menu2', ['langs'=> $langs, $answer])
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')


<div class="text-left">
    <em>
        <a href="{{ route('admin.answer.index', app()->getLocale())}}">Answers</a>
        /{{$answer->id}}/Edit
    </em>
</div>


<div class="edit-answers-section card">
    <h3 class="card-header">Edit Answer №-{{$answer->id}}</h3>

    <div class="card-body">
        <div class="table-responsive-md">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Q ID</th>
                        <th scope="col">Q Body</th>
                        <th scope="col">Q Lang</th>
                        <th scope="col">User</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($answer->questions()->exists())


                    <tr>
                        <td>{{$question->id}}</td>
                        <td>
                            <textarea name="q_body" id="q_body" rows="5" style="width:100%" readonly>{{$question->body}}</textarea>
                        </td>
                        <td>{{$question->lang->lng}}</td>
                        <td>{{$question->user->email}}</td>

                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

@if (!empty($answer))
    <form action="{{route('admin.answer.update', ['locale' => app()->getLocale(), $answer])}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="ans-edit-id" class="col-sm-3 col-form-label col-form-label-lg">Answer ID</label>
            <div class="col-sm-9">
                <input type="text" name="id" class="form-control" id="ans-edit-id" value="{{$answer->id}}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="ans-edit-body" class="col-sm-3 col-form-label col-form-label-lg">Answer Body</label>
            <div class="col-sm-9">
                <textarea name="body" id="ans-edit-body" cols="30" rows="5" class="form-control">{{$answer->body}}</textarea>
            </div>
        </div>

        <hr>
        <button type="submit" class="btn btn-outline-dark btn-lg" >Update Answer</button>
    </form>
@endif

    </div>
</div>
@endsection
