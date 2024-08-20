<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">{{ $title }}</h3>
        @if (isset($breadcrumb))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $key => $value)
                        <li class="breadcrumb-item"><a href="{{ route($value) }}">{{ $key }}</a></li>
                    @endforeach
                    @if (isset($active))
                        <li class="breadcrumb-item active">{{ $active }}</li>
                    @endif
                </ol>
            </nav>
        @endif
        <h6 class="op-7 mb-2"></h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Add Customer</a> --}}
        @if (isset($addBtnRoute))
            @if (Auth::user()->can($addBtnPermission))
                @if (isset($addBtnRouteReload))
                    <a href="{{ $addBtnRoute }}" class="btn btn-primary btn-round">
                        <i class="fa fa-plus"></i>
                        {{ $addBtnLabel }}
                    </a>
                @else
                    <a href="javascript:void(0)" data-link="{{ $addBtnRoute }}"
                        class="getPage btn btn-primary btn-round">
                        <i class="bi bi-plus"></i>
                        {{ $addBtnLabel }}
                    </a>
                @endif
            @endif
        @endif


    </div>
</div>
