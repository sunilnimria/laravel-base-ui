<link rel="stylesheet" href="{{ asset('assets/css/multiStepForm.css') }}">
<x-modal.multiFormHeader modalTitle="Add Student" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <form id="modalForm" class="storeData" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-12" id="step_container">
                <div class="step student-details">
                    <h4>Student Details</h4>

                    <x-form.input type="text" id="name" name="name" placeholder="Name of Student"
                        labelFor="name" labelName="Name" desc="Enter Student name" required />

                    <x-form.input type="text" id="father_name" name="father_name" placeholder=""
                        labelFor="father_name" labelName="Father Name" desc="Father Name of Student" required />

                    <x-form.input type="text" id="mother_name" name="mother_name" placeholder=""
                        labelFor="mother_name" labelName="Mother Name" desc="Mother Name of Student" required />

                    @php
                        $data = [
                            [
                                'icon' => 'bi bi-gender-male mx-2',
                                'type' => 'radio',
                                'name' => 'gender',
                                'value' => 'male',
                                'label' => 'Male',
                                'checked' => false,
                            ],
                            [
                                'icon' => 'bi bi-gender-female mx-2',
                                'type' => 'radio',
                                'name' => 'gender',
                                'value' => 'female',
                                'label' => 'Female',
                                'checked' => false,
                            ],
                            [
                                'icon' => 'bi bi-gender-ambiguous mx-2',
                                'type' => 'radio',
                                'name' => 'gender',
                                'value' => 'other',
                                'label' => 'Other',
                                'checked' => false,
                            ],
                        ];
                    @endphp
                    <x-form.radio labelName="Gender" :options="$data" />
                    @php
                        $time = strtotime('-18 year', time());
                        $minDate = date('Y-m-d', $time);
                    @endphp

                    <x-form.input type="date" id="dob" name="dob" placeholder="" max="{{ date('Y-m-d') }}"
                        min="{{ $minDate }}" labelFor="dob" labelName="Date of Birth"
                        desc="Please Select Date of Birth." required />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Student Photo</span>
                            </div>
                            <div class="col-md-7 input-file-image1">
                                <input type="file" class="form-control prevImage" name="photo"
                                    accept="image/png, image/gif, image/jpeg, image/jpg" />
                            </div>
                            <div class="col-md-2  prev-file-image">
                                <img class="img-thumbnail  img-upload-preview" id="image" src=""
                                    width="150px">
                            </div>
                        </div>
                    </div>
                    @php
                        $data = [];
                        foreach ($bloodGroups as $bg) {
                            $selected = false;

                            $data[] = [
                                'value' => $bg->id,
                                'label' => $bg->name,
                                'selected' => $selected,
                            ];
                        }
                    @endphp
                    <x-form.select id="blood_group" name="blood_group" labelFor="blood_group" labelName="Blood Group"
                        :options="$data" desc="Select blood group of student" />
                </div>
                <div class="step admission">
                    <h4>Addmission Details</h4>
                    @php
                        $minDate = date('Y');
                    @endphp

                    <x-form.input type="text" id="admission_no" name="admission_no" placeholder=""
                        labelFor="admission_no" labelName="Admission No"
                        desc="Enter Admission no as on Admission Widthdraw" required />

                    <x-form.input type="date" id="reg_date" name="reg_date" placeholder="" max="{{ date('Y-m-d') }}"
                        min="{{ $minDate }}-04-01" labelFor="reg_date" labelName="Admission Date"
                        value="{{ date('Y-m-d') }}" desc="Please admission Select Date" required />



                    @php
                        $data = [];
                        foreach ($classes as $class) {
                            $selected = false;

                            $data[] = [
                                'value' => $class->id,
                                'label' => $class->name,
                                'selected' => $selected,
                            ];
                        }
                    @endphp
                    <x-form.select id="my_class_id" class="getSections" name="my_class_id" labelFor="my_class_id"
                        labelName="Class" :options="$data" desc="Select student parsent class" />
                    @php
                        $data = [];
                    @endphp
                    <x-form.select id="section_id" name="section_id" labelFor="section_id" labelName="Section"
                        :options="$data" desc="Select student Class Section" />


                </div>
                <div class="step address">
                    <h4>Address</h4>
                    <x-form.input type="text" id="house_no" name="house_no" placeholder=""
                        labelFor="house_no" labelName="House no." desc="" required />

                    <x-form.input type="text" id="landmark" name="landmark" placeholder="" labelFor="landmark"
                        labelName="Landmarks" desc="" />

                    <x-form.input type="text" id="city" name="city" placeholder="" labelFor="city"
                        labelName="Village/City" desc="" required />

                    <x-form.input type="text" id="pin_code" pattern="[0-9]{6}" name="pin_code"
                        placeholder="" labelFor="pin_code" labelName="Pin Code" desc="" required
                        inputmode="numeric" />

                    @php
                        $data = [];
                        foreach ($countries as $country) {
                            $selected = false;
                            if ( $country->country_code == 'IN') {
                                $selected = true;
                            }

                            $data[] = [
                                'value' => $country->id,
                                'label' => $country->name,
                                'selected' => $selected,
                            ];
                        }
                    @endphp
                    <x-form.select id="country_id" class="getStates" name="country_id" labelFor="country_id"
                        labelName="Country" :options="$data" desc="" />
                    @php
                        $data = [];
                        foreach ($states as $state) {
                            $selected = false;
                            if ( $state->state_code == 'HR') {
                                $selected = true;
                            }

                            $data[] = [
                                'value' => $state->id,
                                'label' => $state->name,
                                'selected' => $selected,
                            ];
                        }
                    @endphp
                    <x-form.select id="state_id" class="getDistricts"  name="state_id" labelFor="state_id" labelName="State"
                        :options="$data" desc="" />

                    @php
                        $data = [];
                        foreach ($districts as $district) {
                            $selected = false;
                            $data[] = [
                                'value' => $district->id,
                                'label' => $district->name,
                                'selected' => $selected,
                            ];
                        }
                    @endphp
                    <x-form.select id="district_id" name="district_id" labelFor="district_id" labelName="District"
                        :options="$data" desc="" />
                </div>
                <div class="step contact">
                    <h4>Contact Details</h4>
                    <x-form.input type="text" id="mobile_no" name="mobile_no" placeholder=""
                    labelFor="mobile_no" labelName="Mobile No" desc="" required />

                    <x-form.input type="email" id="email" name="email" placeholder=""
                    labelFor="email" labelName="Email" desc="Enter E-Mail Here" required />

                    <x-form.input type="password" id="password" name="password" placeholder=""
                    labelFor="password" labelName="Password" desc="" required />

                    <x-form.input type="password" id="password-confirm" name="password-confirm" placeholder=""
                    labelFor="password-confirm" labelName="Password Confirm" desc="" required />

                </div>

            </div>
        </div>
    </form>

</div>


<x-modal.multiFormFooter btnLabel="Save" />
<script>

</script>

<script src="{{ asset('assets/js/multiStepForm.js') }}"></script>
