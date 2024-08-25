<div class="sticky-top">
    <div class="modal-header border-0  bg-white">

        @if ($modalTitle)
            <h5 class="modal-title">
                <span class="fw-mediumbold"> {{ $modalTitle }}</span>
            </h5>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            {{-- <span aria-hidden="true">&times;</span> --}}
        </button>
    </div>
    <div class="progress">
        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
            class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
            style="width: 0%"></div>
    </div>
</div>
