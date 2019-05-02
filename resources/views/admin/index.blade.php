@extends('admin.layouts.admin')


@section('title', 'Dashboard')


@section('lang_menu')
@include('admin.includes.menu', $langs)
@endsection



<style>
.view-1, .view-2 {
/* border: 1px solid red; */
}
.main-post-view {
    /* border: 1px solid blue; */
    width: 16rem;
}
.other-posts-view div {
    width: 8rem;
    /* padding: 16px; */
}
.other-posts-view .other-posts-row {
    width: 12rem;
    height: 5.3rem;
}
.card-well {
    width: 90.5%;
}
</style>

@section('content')

@include('admin.common.errors')
@include('admin.common.success')

{{-- {{dd($posters)}} --}}

    <h2 class="bg-info text-white py-3 my-3">Main Page Design</h2>
    <div class="poster-section card">
        <h3 class="py-3 text-secondary card-header">Type Of Poster</h3>
        <div class="poster-types-wrap text-secondary d-flex flex-row justify-content-around align-items-center">
            <div class="type-1">
                <h3>Type 1</h3>
                <div class="view-1 d-flex flex-row justify-content-between">

                    <div class="main-post-view card text-white bg-info justify-content-center">Main post</div>
                    <div class="other-posts-view d-flex flex-column justify-content-between">
                        <div class="card text-white bg-success py-3">1</div>
                        <div class="card text-white bg-success py-3">2</div>
                        <div class="card text-white bg-success py-3">3</div>
                    </div>
                </div>
            </div>

            <div class="type-2">
                    <h3>Type 2</h3>
                <div class="view-2 d-flex flex-row justify-content-center">

                    <div class="main-post-view card text-white bg-info justify-content-center">Main post</div>
                    <div class="other-posts-view d-flex flex-column justify-content-between">
                        <div class="other-posts-row d-flex justify-content-scratch">
                                <div class="card text-white bg-success py-2">1</div>
                                <div class="card text-white bg-success py-2">2</div>
                        </div>
                        <div class="other-posts-row d-flex justify-content-scratch">
                                <div class="card text-white bg-success py-2">3</div>
                                <div class="card text-white bg-success py-2">4</div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="card bg-light mx-auto card-well my-3">
                <div class="card-body">
                <form action="{{ route('admin.poster.update', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="layout" id="four" value="four"
                                @if ($posters[0]->status===1)
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="four">
                                    Show Poster as Type 1
                                </label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" name="layout" id="five" value="five"
                                @if ($posters[1]->status===1)
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="five">
                                    Show Poster as Type 2
                                </label>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-dark">Save Poster Type</button>
                </div>
                </form>
        </div>

    </div>
    <script>
        savePostLayout=(e)=>{
            // no need this code
            // onclick="savePostLayout()"
            e.preventDefault();
            let layout = document.querySelector('input[name="layout"]:checked');
            if (!layout) {
                alert('let chose some layout');
                return false;
            }else{
                // alert(layout.value)
                return true;
            }

        }
    </script>

@endsection
