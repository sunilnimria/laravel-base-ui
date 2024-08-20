<x-modal.modalHeader modalTitle="Add Section" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <form id="modalForm" class="storeData" action="{{ route('sections.store') }}"
        method="POST">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-12">
                <x-form.input type="text" id="name" name="name" placeholder="Name of Section" labelFor="name"
                    labelName="Name" desc="Enter Section name" required />

                @php
                    $data = [];
                    foreach ($classes as $class) {
                        $data[] = [
                            'value' => $class->id,
                            'label' => $class->name,
                        ];
                    }
                @endphp

                <x-form.select id="my_class_id" name="my_class_id" labelFor="my_class_id" labelName="Class"
                    :options="$data" desc="Select Class." required />

                @php
                    $data = [];
                    foreach ($teachers as $teacher) {
                        $data[] = [
                            'value' => $teacher->id,
                            'label' => $teacher->name,
                        ];
                    }
                @endphp

                <x-form.select id="teacher_id" name="teacher_id" labelFor="teacher_id" labelName="Teacher"
                    :options="$data" desc="Select Class Incharge." required />

                @php
                    $data = [
                        [
                            'icon' => 'bi bi-eye mx-2',
                            'type' => 'radio',
                            'name' => 'active',
                            'value' => 1,
                            'label' => 'Active',
                            'checked' => true,
                        ],
                        [
                            'icon' => 'bi bi-eye-slash mx-2',
                            'type' => 'radio',
                            'name' => 'active',
                            'value' => 0,
                            'label' => 'Deactive',
                            'checked' => false,
                        ],
                    ];
                @endphp
                <x-form.radio labelName="Status" :options="$data" />

            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Save" />
