@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Sections')
@section('description', 'This is Sections management page')

@section('main-content')

    <div class="page-inner">

        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('sections.create'),
            'addBtnLabel' => 'Add Section',
            'addBtnPermission' => 'section.create',
        ])
            @slot('active')
                Sections
            @endslot
            @slot('title')
                Manage Sections
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
