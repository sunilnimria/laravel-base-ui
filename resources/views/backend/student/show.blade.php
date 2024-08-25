<x-modal.modalHeader modalTitle="{{ $student->name }}" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <div class="row">
        <div class="col-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="card">
                    <div class="text-center">
                        <img class="card-img-top" src="{{ url('storage/' . $student->photo) }}" alt="{{ $student->name }}"
                            style="width:150px">
                        <h4 class="card-title">
                            {{ $student->name }}
                            <br><span class="fs-6">{{ $student->my_class->name }}
                                ({{ $student->section->name }})</span>
                        </h4>

                    </div>
                    <div class="card-body">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Student Details
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                              <tr>
                                                <td class="fw-bold">Father Name</td>
                                                <td>{{$student->father_name}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Mother Name</td>
                                                <td>{{$student->mother_name}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Date of Birth</td>
                                                <td>{{$student->dob}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Gender</td>
                                                <td>{{$student->gender}}</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Admission Details
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                              <tr>
                                                <td class="fw-bold">Admission No</td>
                                                <td>{{$student->admission_no}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Admission Date</td>
                                                <td>{{$student->reg_date}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Addmission Class</td>
                                                <td>{{$student->regClass->name}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Persent Class</td>
                                                <td>{{$student->my_class->name}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Section Name</td>
                                                <td>{{$student->section->name}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Roll No</td>
                                                <td>{{$student->roll_no}}</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Contact Details
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                              <tr>
                                                <td class="fw-bold">Mobile No</td>
                                                <td>{{$student->mobile_no}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Email</td>
                                                <td>{{$student->email}}</td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Address</td>
                                                <td>
                                                    {{$student->house_no}}, {{$student->landmark}},<br>
                                                    {{$student->city}},<br>
                                                    {{$student->district->name}}, {{$student->state->name}},<br>
                                                    {{$student->country->name}}-{{$student->pin_code}},<br>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td class="fw-bold">Roll No</td>
                                                <td>{{$student->roll_no}}</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


</div>
