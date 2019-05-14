@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')


    <div class="quest-list-section card">
        <h3 class="py-3 text-secondary card-header">Question Management.</h3>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Body</th>
                            <th scope="col">Lang</th>
                            <th scope="col">User</th>
                            <th scope="col">Visible</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->body}}</td>
                            <td>{{ app()->getLocale() }}</td>
                            <td>{{ $item['user']->email }}</td>

                            @if ($item->visible)
                            <td class="bg-success">{{$item->visible}}</td>
                            @else
                            <td class="bg-danger">{{$item->visible}}</td>
                            @endif

                            <td>
                                @if ($item->questionable_id)
                                <!-- Answered -->
                                <div class="text-success">replied</div>
                                <div class="btn-group">
                                    @if (preg_match('/Answer$/', $item->questionable_type))
                                        <a href="{{route('admin.answer.edit',['locale'=>app()->getLocale(), 'id'=>$item->questionable_id])}}" class="btn btn-outline-primary" role="button" target="_blank">show Answer</a>
                                    @else
                                        <a href="{{route('admin.post.show', ['locale'=>app()->getLocale(), 'id'=>$item->questionable_id])}}" class="btn btn-outline-primary" role="button" target="_blank">Show Post</a>
                                    @endif


                                    <a href="{{ route('admin.question.edit',['locale'=>app()->getLocale(),$item]) }}" class="btn btn-outline-info" role="button" target="_blank">
                                        <i class='fas fa-edit' style='font-size:18px'></i>
                                        @if ($item->getDocuments()->exists())
                                        <i class="fas fa-paperclip" style='font-size:18px'></i>
                                        @endif
                                    </a>

                                </div>
                                @else
                                    <!-- Reply -->
                                    <div class="text-danger">not replied</div>
                                    <div class="btn-group" role="group">
                                            <button id="btnGroupReply" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Reply by
                                            </button>
                                            <div class="dropdown-menu py-0" aria-labelledby="btnGroupReply">
                                                <div class="list-group">
                                                    <a  href="{{ route('admin.question.post',['locale'=>app()->getLocale(),  'q_id'=>$item->id]) }}" class="btn btn-outline-success" role="button" target="_blank"> Post</a>
                                                    <a href="{{route('admin.answer.create',['locale'=>app()->getLocale(), 'q_id'=>$item->id])}}" class="btn btn-outline-success" role="button" target="_blank"> Answer</a>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.question.edit',['locale'=>app()->getLocale(),$item]) }}" class="btn btn-outline-info" role="button" target="_blank">
                                                <i class='fas fa-edit' style='font-size:18px'></i>
                                                @if ($item->getDocuments()->exists())
                                                <i class="fas fa-paperclip" style='font-size:18px'></i>
                                                @endif
                                            </a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-primary" role="alert">
                                    No data to show.
                                </div>
                            </td>
                        </tr>


                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="6">
                               {{ $questions->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection
