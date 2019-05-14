@extends('admin.layouts.admin')

@section('title', 'Questions')

@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection

@section('content')

@include('admin.common.errors')
@include('admin.common.oneerror')
@include('admin.common.success')

<div class="ans-list-section card">
    <h3 class="card-header text-secondary">Answer Management</h3>

    <div class="card-body">
    <div class="table-responsive-md">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">A ID</th>
                    <th scope="col">A Body</th>
                    <th scope="col">Q ID</th>
                    <th scope="col">Q Body</th>
                    <th scope="col">Q Lang</th>
                    <th scope="col">User</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $item)
                <tr>
                    <th scope="row">{{$item->questionable->id}}</th>
                    <td>{{$item->questionable->body}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->body}}</td>
                    <td>{{$item->lang->lng}}</td>
                    <td>{{$item->user->email}}</td>
                    <td style="min-width:8rem">
                        <div class="btn-group">
                            <form action="{{route('admin.answer.destroy', ['locale'=>app()->getlocale(), $item->questionable ])}}" method="POST"
                                onsubmit="return confirm('Do you really want to delete It?')? true : false">
                                @csrf
                                @method('delete')
                                <a href="{{route('admin.answer.edit', ['locale' => app()->getLocale(),$item->questionable ])}}" class="btn btn-outline-primary" role="button" target="_blank">
                                    <i class="fas fa-pen-nib"></i>
                                </a>
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>


                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="alert alert-info">
                            No data to show.
                        </div>
                    </td>
                </tr>

                @endforelse
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <td colspan="7">
                       {{ $questions->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    </div>
</div>

@endsection
