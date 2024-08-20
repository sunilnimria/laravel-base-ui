<x-modal.modalHeader modalTitle="{{ ucfirst($user->name) }}" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <div class="row">
        <div class="col-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="card">
                    <img class="card-img-top" src="{{ url('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                        style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->name }}</h4>
                        <p class="card-text">

                        </p>

                        {{-- @php
                            $data = [
                                [
                                    'title' => 'Optin 1',
                                    'desc' => 'Helo This is me',
                                ],
                                [
                                    'title' => 'Optin 2',
                                    'desc' => "Placeholder content for this accordion, which is intended to demonstrate the
                .accordion-flush class. This is the second item's accordion body. Let's imagine this being
                filled with some actual content.",
                                ],
                            ];
                        @endphp
                        <x-accordion id="Hello" :options="$data" /> --}}
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <x-form.input type="text" id="name" name="name" placeholder="John" labelFor="name"
                            :value="$user->name" labelName="Role Name" desc="Enter User name here" />

                        <x-form.input type="email" id="email" name="email" placeholder="example@gmail.com"
                            :value="$user->email" labelFor="email" labelName="Email" desc="Enter E-mail ID" />

                        <x-form.input type="text" id="username" name="username" placeholder="john" disabled :value="$user->username"
                            labelFor="username" labelName="User-name" desc="Enter User Name" />

                        <x-form.input type="password" id="password" name="password" labelFor="password" labelName="Password"
                            desc="Enter Password" />

                        <x-form.input type="password" id="password_confirmation" name="password_confirmation"
                            labelFor="password_confirmation" labelName="Confirm Password" desc="Confirm Password" />

                        @php
                            $data = [];
                            foreach ($roles as $role) {
                                $checked = false;
                                foreach ($user->roles as $key) {
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
                </div> --}}
            </div>
        </div>
    </div>


</div>
