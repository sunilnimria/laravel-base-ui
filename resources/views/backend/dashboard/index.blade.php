@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Category')
@section('description', 'This is Category management page')

@section('main-content')

    <div class="page-inner">
        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            // 'breadcrumb' => ['Dashboard' => 'dashboard'],
            // 'addBtnRoute' => route('admin'),
            // 'addBtnLabel' => 'Add Category',
        ])
            @slot('title')
                Dashboard
            @endslot
            {{-- @slot('active')
                Category
            @endslot --}}
        @endcomponent



        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <a href="{{ route('roles.index') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-users"></i> Roles</div>
                                        <h2>{{ $total_roles }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <a href="{{ route('roles.index') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-user"></i> Admins</div>
                                        <h2>{{ $total_admins }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Permissions</div>
                                    <h2>{{ $total_permissions }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection
@push('styles')

@endpush
@push('scripts')



@endpush
