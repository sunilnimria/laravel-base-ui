@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Roles')
@section('description', 'This is Roles management page')

@section('main-content')

    <div class="page-inner">

        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('roles.create'),
            'addBtnLabel' => 'Add Roles',
            'addBtnPermission' => 'role.create',
        ])
            @slot('active')
                Roles
            @endslot
            @slot('title')
                Manage Roles
            @endslot
        @endcomponent



        <div class="row">
            <div class="col-md-12">


                {{ $dataTable->table() }}
            </div>
        </div>

    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
