<x-modal.modalHeader modalTitle="Edit User" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}


    <form id="modalForm" class="storeData" action="{{ route('users.update', $admin->id) }}"
        method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <input type="hidden" name="id" value="{{ $admin->id }}">
                <x-form.input type="text" id="name" name="name" placeholder="John" labelFor="name"
                    :value="$admin->name" labelName="Role Name" desc="Enter User name here" />

                <x-form.input type="email" id="email" name="email" placeholder="example@gmail.com"
                    :value="$admin->email" labelFor="email" labelName="Email" desc="Enter E-mail ID" />

                <x-form.input type="text" id="username" name="username" placeholder="john" disabled :value="$admin->username"
                    labelFor="username" labelName="User-name" desc="Enter User Name" />

                <x-form.input type="password" id="password" name="password" labelFor="password" labelName="Password"
                    desc="Enter Password" />

                <x-form.input type="password" id="password_confirmation" name="password_confirmation"
                    labelFor="password_confirmation" labelName="Confirm Password" desc="Confirm Password" />

                @php
                    $data = [];
                    foreach ($roles as $role) {
                        $checked = false;
                        foreach ($admin->roles as $key) {
                            if ($key->name === $role->name) {
                                $checked = true;
                            }
                        }
                        $data[] = [
                            'name' => 'roles[]',
                            'value' => $role->name,
                            'label' => $role->name,
                            'checked' => $checked,
                        ];
                    }
                @endphp

                <x-form.groupCheckbox labelName="Assign Roles" :options="$data"
                    desc="Select roles that you wants to give this user." />


            </div>
        </div>
    </form>

</div>

<x-modal.modalFooter btnLabel="Update" />
