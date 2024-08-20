<x-modal.modalHeader modalTitle="Add User" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}


    <form id="modalForm" class="storeData" action="{{ route('users.store') }}"
        method="POST">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-12">
                <x-form.input type="text" id="name" name="name" placeholder="John" labelFor="name"
                    labelName="Name" desc="Enter User name here" />

                <x-form.input type="email" id="email" name="email" placeholder="example@gmail.com"
                    labelFor="email" labelName="Email" desc="Enter E-mail ID" />

                <x-form.input type="text" id="username" name="username" placeholder="john" labelFor="username"
                    labelName="User-name" desc="Enter User Name" />

                <x-form.input type="password" id="password" name="password" labelFor="password" labelName="Password"
                    desc="Enter Password" />

                <x-form.input type="password" id="password_confirmation" name="password_confirmation"
                    labelFor="password_confirmation" labelName="Confirm Password" desc="Confirm Password" />

                @php
                    $data = [];
                    foreach ($roles as $role) {
                        $data[] = [
                            'name' => 'roles[]',
                            'value' => $role->name,
                            'label' => $role->name,
                        ];
                    }
                @endphp

                <x-form.groupCheckbox labelName="Assign Roles" :options="$data" desc="Select roles that you wants to give this user." />

            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Save" />
