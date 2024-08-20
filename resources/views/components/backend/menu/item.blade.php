@php
    if (url()->current() == $link) {
        $active = 'active';
    } else {
        $active = '';
    }
@endphp
<li class="nav-item {{ (url()->current() == $link) ? 'active':'' }}">
    <a href="{{ $link }}">
        @if ($icon)
            <i class="{{ $icon }}"></i>
        @endif
        <p>{{ $title }}</p>

        @if (isset($successCount))
        <span class="badge badge-success">{{$successCount}}</span>
        @endif
        @if (isset($unsuccessCount))
        <span class="badge badge-secondary">{{$unsuccessCount}}</span>
        @endif
    </a>
</li>
