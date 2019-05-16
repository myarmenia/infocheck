{{-- This menu come from DB --}}
@isset($langs)
@isset($id)

@foreach ($langs as $item)
    <li class="nav-item">
        <a class="nav-link"
        href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),['locale'=>$item->lng, 'id'=>$id]) }}"
            @if (app()->getLocale() == $item->lng) style="font-weight: bold; text-decoration: underline" @endif>
            {{ strtoupper($item->lng) }}
        </a>
    </li>
@endforeach

@endisset
@endisset
