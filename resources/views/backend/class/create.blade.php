<x-modal.modalHeader modalTitle="Add Class" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <span>When a class is created, a Section will be automatically created for the class, you can edit it or
                    add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Manage
                        Sections</a>
                </span>
            </div>
        </div>
    </div>


    <form id="modalForm" class="storeData" action="{{ route('classes.store') }}"
        method="POST">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-12">
                <x-form.input type="text" id="name" name="name" placeholder="Name of class" labelFor="name"
                    labelName="Name" desc="Enter Class name" required />

                @php
                    $data = [];
                    foreach ($class_types as $ct) {
                        $data[] = [
                            'value' => $ct->id,
                            'label' => $ct->name,
                        ];
                    }
                @endphp

                <x-form.select id="class_type_id" name="class_type_id" labelFor="class_type_id" labelName="Class Type"
                    :options="$data" desc="Select Class type." required />

            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Save" />
