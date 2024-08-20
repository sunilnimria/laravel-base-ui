<x-modal.modalHeader modalTitle="Edit Class" />

<div class="modal-body">

    <form id="modalForm" class="storeData" action="{{ route('subjects.update', $subject) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <input type="hidden" name="id" value="{{ $subject->id }}">
                <x-form.input type="text" id="name" name="name" placeholder="Name of Subject" labelFor="name"
                    value="{{ $subject->name }}" labelName="Name" desc="Enter Subject name" required />

                <x-form.input type="text" id="slug" name="slug" placeholder="Short Name Like English : ENG"
                    labelFor="slug" value="{{ $subject->slug }}" labelName="Slug"
                    desc="Enter Short Name of  Subject Like English : ENG, Hindi: HIN" required />

                @php
                    $data = [];
                    foreach ($classes as $class) {
                        $selected = false;
                        if ($class->id === $subject->my_class_id) {
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
                    :options="$data" desc="Select Class." required />

                @php
                    $data = [];
                    foreach ($teachers as $teacher) {
                        $selected = false;
                        if ($teacher->id === $subject->teacher_id) {
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
                            'name' => 'has_practical',
                            'value' => 1,
                            'label' => 'Yes',
                            'checked' => $subject->has_practical == true ? true : false,
                        ],
                        [
                            'icon' => 'bi bi-eye-slash mx-2',
                            'type' => 'radio',
                            'name' => 'has_practical',
                            'value' => 0,
                            'label' => 'No',
                            'checked' => $subject->has_practical == false ? true : false,
                        ],
                    ];

                @endphp
                <x-form.radio labelName="This is a Practical Subject" :options="$data" />
            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Update" />
