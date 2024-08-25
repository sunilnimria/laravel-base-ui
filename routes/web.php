<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MyClassController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Settings
    Route::get('settings',[ DashboardController::class, 'create'])->name('settings');
    Route::post('settings',[ DashboardController::class, 'store'])->name('settings.store');
    Route::get('settings/reset',[ DashboardController::class, 'reset'])->name('settings.reset');
    // Roles
    Route::resource('roles', RolesController::class);
    //Users
    Route::resource('users', UsersController::class);
    //Classes
    Route::resource('classes', MyClassController::class);
    //Section
    Route::resource('sections', SectionController::class);
    //Subjects
    Route::resource('subjects', SubjectController::class);
    //Students
    Route::resource('students', StudentsController::class);

    // Get by Ajax
    Route::get('get-states/{id}', [ DashboardController::class, 'getStates'])->name('states.ajax');
    Route::get('get-districts/{id}', [ DashboardController::class, 'getDistricts'])->name('districts.ajax');
    Route::get('get-sections/{id}', [ SectionController::class, 'getSections'])->name('sections.ajax');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
