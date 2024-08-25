<div id="q-box__buttons" class="modal-footer border-0 sticky-bottom bg-white">

    <button id="prev-btn"  class="btn btn-primary" type="button">Previous</button>
    <button id="next-btn"  class="btn btn-secondary" type="button">Next</button>
    <button type="button" id="submit-btn" class="btn btn-primary" onclick="$('form#modalForm').submit()">
        {{$btnLabel}}
    </button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
        Close
    </button>
</div>

