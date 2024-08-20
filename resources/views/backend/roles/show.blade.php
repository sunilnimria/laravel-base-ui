<x-modal.modalHeader modalTitle="{{ ucfirst($role->name) }} has permissions" />

<div class="modal-body">
    {{-- <p class="small">
      Create a new row using this form, make sure you
      fill them all
  </p> --}}



    <div class="row">
        <div class="col-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @php $i = 1; @endphp
                @foreach ($permission_groups as $group)
                    <div class="accordion-item">

                        @php
                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                            $j = 1;
                        @endphp
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#role-{{ $i }}-management" aria-expanded="false"
                                aria-controls="role-{{ $i }}-management">
                                {{ ucfirst( $group->name )}}
                            </button>
                        </h2>
                        <div id="role-{{ $i }}-management" class="accordion-collapse collapse {{ $i == 1 ? 'show' : ''}}"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group w-50 mx-auto">
                                @foreach ($permissions as $permission)
                                <div class="list-group-item">
                                    @if ($role->hasPermissionTo($permission->name))

                                    <span class="d-inline-flex align-items-center justify-content-center rounded m-1 me-2 text-success fs-2" style="width: 20px; height: 20px;">
                                      <i class="bi bi-check"></i>
                                    </span>
                                    @else

                                    <span class="d-inline-flex align-items-center justify-content-center rounded m-1 me-2 text-danger fs-2" style="width: 20px; height: 20px;">
                                      <i class="bi bi-x"></i>
                                    </span>
                                    @endif
                                    {{ $permission->name }}
                                </div>
                                @php  $j++; @endphp
                                    {{-- <div class="form-check p-0">
                                        <input type="checkbox" class="form-check-input"
                                            onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                            name="permissions[]"
                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                            id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label"
                                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div> --}}
                                @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    @php  $i++; @endphp
                @endforeach
            </div>
        </div>
    </div>


</div>
