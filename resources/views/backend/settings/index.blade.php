@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Settings')
@section('description', 'This is site management page')

@section('main-content')

    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Manage Settings</h3>
                <h6 class="op-7 mb-2">Site General Setting</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                {{-- <a href="#" class="btn btn-label-info btn-round me-2">Add Customer</a> --}}
                <a href="#updateGeneralSetting" class="btn btn-primary btn-round">Update Setting</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Update Setting</div>
                            <div class="card-tools">
                                {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a> --}}
                                <a href="javascript:void(0)" data-link="{{route('settings.reset')}}" class="resetData btn btn-round btn-sm" title="Reset Settings">
                                    <span class="btn-label">
                                        <i class="fa fa-eraser"></i>
                                    </span>
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                        <!-- form start -->
                        <form action="{{ route('settings.store') }}" class="form-horizontal storeData" id="updateGeneralSetting"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- jquery validation -->
                                    <input type="hidden" class="url" value="{{ url('admin/general-settings') }}">
                                    <!-- jquery validation -->
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12" id="general">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">General Settings</h3>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Site Name</span>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            name="title" value="{{ $title }}"
                                                                            placeholder="Enter Name">
                                                                        @error('title')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Site Email</span>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="email" class="form-control"
                                                                            name="email" value="{{ $email }}">
                                                                            @error('email')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Logo</span>
                                                                    </div>
                                                                    <div class="col-md-7 input-file-image">
                                                                        <input type="file" class="form-control"
                                                                            name="logo" onChange="readURL(this);"
                                                                            accept="image/png, image/gif, image/jpeg, image/jpg" />
                                                                        @error('logo')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-2  prev-file-image">
                                                                        @if (empty($logo))
                                                                            <img class="img-thumbnail  img-upload-preview" id="image"
                                                                                src="{{ asset('site/default.png') }}"
                                                                                width="150px">
                                                                        @else
                                                                            <img class="img-thumbnail  img-upload-preview" id="image"
                                                                                src="{{ url('storage/' .  $logo) }}"
                                                                                width="150px">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Fevicon</span>
                                                                    </div>
                                                                    <div class="col-md-7 input-file-image">
                                                                        <input type="file" class="form-control"
                                                                            name="fevicon" onChange="readURL(this);"
                                                                            accept="image/png, image/gif, image/jpeg, image/jpg" />
                                                                    </div>
                                                                    <div class="col-md-2 prev-file-image">
                                                                        @if (empty($fevicon))
                                                                            <img class="img-thumbnail img-upload-preview" id="image"
                                                                                src="{{ asset('site/default.png') }}"
                                                                                width="150px">
                                                                        @else
                                                                            <img class="img-thumbnail img-upload-preview" id="image"
                                                                                src="{{ url('storage/' . $fevicon) }}"
                                                                                width="150px">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Copyright Text</span>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            name="copyright" value="{{ $copyright }}">
                                                                            @error('copyright')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Theme Color</span>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="color" class=""
                                                                            name="theme_color"
                                                                            value="{{ $theme_color }}">
                                                                            @error('theme_color')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <span>Description</span>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" name="description" id="" cols="30" rows="4">{!! htmlspecialchars_decode($description) !!}</textarea>
                                                                        @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="submit"
                                                        class="btn btn-round update-general-settings bg-light float-end"
                                                        value="Update" />
                                                    {{-- <button type="submit" class="btn btn-label-info btn-round me-2">Update</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>


                        </form> <!-- /.form start -->
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection


@push('scripts')
@endpush
