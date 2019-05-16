@extends('admin.layouts.admin')

@section('title', 'Questions - Edit')

@section('lang_menu')
{{-- @include('admin.includes.menu', $langs) --}}
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.success')


{{-- {{dd($question->getDocuments)}} --}}

<div class="text-left">
    <em>
        <a href="{{ route('admin.question.index', app()->getLocale())}}">Questions</a>
        /Edit
    </em>
</div>
<div class="card">
        <h3 class="card-header">Edit Question N {{$question->id}}</h3>

        <form class="py-3 px-5" action="{{ route('admin.question.update',['locale'=>app()->getLocale(), $question] ) }}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="cart-body">
                        <div class="form-group row">
                            <label for="quest-edit-id" class="col-sm-3 col-form-label col-form-label-lg">ID</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="quest-edit-id" value="{{$question->id}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quest-edit-lng-name" class="col-sm-3 col-form-label col-form-label-lg">Language</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control" id="quest-edit-lng-name" value="{{$lng_name}}" disabled> --}}
                                <select name="lang_id" id="quest-edit-lng-name" class="form-control" disabled>
                                    @foreach ($langs as $item)
                                    <option value="{{$item->id}}"
                                        @if ($item->id === $question->lang_id)
                                            selected
                                        @endif

                                    >{{$item->lng_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="quest-edit-body" class="col-sm-3 col-form-label col-form-label-lg">Body</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control" id="edit-cat-lng-name" value="{{$question->body}}" > --}}
                                <textarea name="body" id="quest-edit-body" cols="30" rows="5" class="form-control" disabled>{{$question->body}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quest-edit-visible" class="col-sm-3 col-form-label col-form-label-lg" >Visible (answered)</label>
                            <div class="col-sm-9">
                                <select name="visible" id="quest-edit-visible" class="form-control">
                                    <option value="1" @if ($question->visible) selected @endif>Show</option>
                                    <option value="0" @if (!$question->visible) selected @endif>Hide</option>
                                </select>
                            </div>
                        </div>




                        <hr/>
                        <button type="submit" class="btn btn-outline-dark btn-lg" >Update Question</button>
                </div>
        </form>
        <div class="card-footer">
            @if (!$question->getDocuments()->exists())
                <p>No Attachment!</p>
            @endif

            @if ($question->questionable_id)
            <div class="alert alert-success" role="alert">

                <form action="{{route('admin.question.reset',[
                    'locale' => app()->getLocale(),
                    $question
                ])}}" method="POST">
                @csrf
                    @if (preg_match('/Answer$/', $question->questionable_type))
                    <h4>Replied by Answer N-{{$question->questionable_id}}</h4>
                    <button class="btn btn-outline-danger"
                    onclick="return confirm('Do you want to reset answer (Answer will be deleted)')?true:false">Reset Replied Answer</button>
                    @else
                    <h4>Replied by Post N-{{$question->questionable_id}}</h4>
                    <button class="btn btn-outline-danger"
                    onclick="return confirm('Do you want to reset post from question')?true:false">Reset Replied Post</button>
                    @endif

                </form>

            </div>
            @endif


            {{-- <div class="alert alert-primary" role="alert">
                Choose a language within the meaning of the sentence!
            </div> --}}
        </div>
</div>


@if ($question->getDocuments()->exists())
<div class="card mt-3">
    <h4 class="card-header">Attached Files</h4>
    <div class="card-body">
            <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">path</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($question->getDocuments as $item)
                            <tr>
                                <th  scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->link}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    <a role="button" class="btn btn-outline-success" href="{{asset($item->link)}}" target="_blank">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>
@endif

@endsection
