@php
    // if (url()->current() == $link) {
    //     $active = 'active';
    // } else {
    //     $active = '';
    // }
@endphp

<div class="collapse" {{$attributes}}>
    <ul class="nav nav-collapse">
        @foreach ($array as $key )
        <li>
            <a href="{{$key['href']}}" class="{{url()->current() == $key['href'] ? 'active': ''}}">
                <span class="sub-item">{{$key['subLabel']}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
