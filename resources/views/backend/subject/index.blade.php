@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Subject')
@section('description', 'This is Subject management page')

@section('main-content')

    <div class="page-inner">
        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('subjects.create'),
            'addBtnLabel' => 'Add Subject',
            'addBtnPermission' => 'subject.create',
        ])
            @slot('active')
                Subjects
            @endslot
            @slot('title')
                Manage Subjects
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
