@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Users')
@section('description', 'This is Users management page')

@section('main-content')

    <div class="page-inner">
        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('users.create'),
            'addBtnLabel' => 'Add Users',
            'addBtnPermission' => 'admin.create',
        ])
            @slot('active')
                Users
            @endslot
            @slot('title')
                Manage Users
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-md-12">

                <!-- show data table component -->
                {{ $dataTable->table() }}

            </div>
        </div>

    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
    <!-- DataTables -->
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
