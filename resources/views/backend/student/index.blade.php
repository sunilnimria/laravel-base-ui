@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Student')
@section('description', 'This is Student management page')

@section('main-content')

    <div class="page-inner">
        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('students.create'),
            'addBtnLabel' => 'Add Student',
            'addBtnPermission' => 'student.create',
        ])
            @slot('active')
                Students
            @endslot
            @slot('title')
                Manage Students
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
