@extends('layouts.master')

@section('author', '')
@section('title', 'Manage Classes')
@section('description', 'This is Classes management page')

@section('main-content')

    <div class="page-inner">

        <!-- Content Header (Page header) -->
        @component('components.backend.content-header', [
            'breadcrumb' => ['Dashboard' => 'dashboard'],
            'addBtnRoute' => route('classes.create'),
            'addBtnLabel' => 'Add Class',
            'addBtnPermission' => 'class.create',
        ])
            @slot('active')
                Classes
            @endslot
            @slot('title')
                Manage Classes
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
