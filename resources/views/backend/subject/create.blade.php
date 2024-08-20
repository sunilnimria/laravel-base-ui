<x-modal.modalHeader modalTitle="Add Subject" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <form id="modalForm" class="storeData" action="{{ route('subjects.store') }}"
        method="POST">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-12">
                <x-form.input type="text" id="name" name="name" placeholder="Name of Subject" labelFor="name"
                    labelName="Name" desc="Enter Subject name" required />

                <x-form.input type="text" id="slug" name="slug" placeholder="Short Name Like English : ENG" labelFor="slug"
                    labelName="Slug" desc="Enter Short Name of  Subject Like English : ENG, Hindi: HIN" required />

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
                            'name' => 'has_practical',
                            'value' => 1,
                            'label' => 'Yes',
                            'checked' => true,
                        ],
                        [
                            'icon' => 'bi bi-eye-slash mx-2',
                            'type' => 'radio',
                            'name' => 'has_practical',
                            'value' => 0,
                            'label' => 'No',
                            'checked' => false,
                        ],
                    ];
                @endphp
                <x-form.radio labelName="This is a Practical Subject" :options="$data" />

            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Save" />
