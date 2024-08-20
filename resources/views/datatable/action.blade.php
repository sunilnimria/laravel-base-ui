<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-server"></i>
    </button>
    <ul class="dropdown-menu">
        @if (isset($view))
            @if (Auth::user()->can($view['permission']))
                <li>
                    <a href="javascript:void(0)" data-link="{{ route($view['route'], $row->id) }}"
                        class="getPage dropdown-item">
                        <span class="btn btn-success btn-sm mx-1">
                            <i class="bi bi-eye"></i>
                        </span>
                        View
                    </a>
                </li>
            @endif
        @endif
        @if (isset($edit))
            @if (Auth::user()->can($edit['permission']))
                <li>
                    <a href="javascript:void(0)" data-link=" {{ route($edit['route'], $row->id) }}"
                        class="getPage dropdown-item">
                        <span class="btn btn-warning btn-sm mx-1">
                            <i class="bi bi-pencil"></i>
                        </span>
                        Edit
                    </a>
                </li>
            @endif
        @endif
        @if (isset($destroy))
            @if (Auth::user()->can($destroy['permission']))
                <li>
                    <a class="deleteData dropdown-item" href="javascript:void(0)"
                        data-link="{{ route($destroy['route'], $row->id) }}" data-csrf="{{csrf_token()}}">
                        <span class="btn btn-danger btn-sm mx-1">
                            <i class="bi bi-trash"></i>
                        </span>
                        Delete
                    </a>
                </li>
            @endif
        @endif
    </ul>
</div>
