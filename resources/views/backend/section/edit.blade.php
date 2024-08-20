<x-modal.modalHeader modalTitle="Edit Class" />

<div class="modal-body">

    <form id="modalForm" class="storeData"
        action="{{ route('sections.update', $section) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <input type="hidden" name="id" value="{{ $section->id }}">
                <x-form.input type="text" id="name" name="name" value="{{ $section->name }}"
                    placeholder="Name of Section" labelFor="name" labelName="Name" desc="Enter Section name" required />

                @php
                    $data = [];
                    foreach ($classes as $class) {
                        $selected = false;
                        if ($class->id === $section->my_class_id) {
                            $selected = true;
                        }
                        $data[] = [
                            'value' => $class->id,
                            'label' => $class->name,
                            'selected' => $selected,
                        ];
                    }
                @endphp

                <x-form.select id="my_class_id" name="my_class_id" labelFor="my_class_id" labelName="Class"
                    :options="$data" desc="Select Class." disabled required />

                @php
                    $data = [];
                    foreach ($teachers as $teacher) {
                        $selected = false;
                        if ($teacher->id === $section->teacher_id) {
                            $selected = true;
                        }
                        $data[] = [
                            'value' => $teacher->id,
                            'label' => $teacher->name,
                            'selected' => $selected,
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
                            'checked' => false,
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
                    for ($i = 0; $i < count($data); $i++) {
                        if ($section->active == $data[$i]['value']) {
                            $data[$i]['checked'] = true;
                        } else {
                            $data[$i]['checked'] = false;
                        }
                    }

                @endphp
                <x-form.radio labelName="Status" :options="$data" />


            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Update" />
