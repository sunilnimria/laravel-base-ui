<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;
// use App\Traits\AuthorizationChecker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\storeUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\Backend\storeAdminRequest;
use App\Http\Requests\Backend\UpdateadminRequest;

class UsersController extends Controller
{
    // use AuthorizationChecker;

    public function __construct()
    {
        $this->middleware(['permission:admin.view'], ['only' => ['index', 'ajaxIndex'] ]);
        $this->middleware(['permission:admin.create'], ['only' => ['create', 'store'] ]);
        $this->middleware(['permission:admin.view'], ['only' => ['show'] ]);
        $this->middleware(['permission:admin.edit'], ['only' => ['edit', 'update'] ]);
        $this->middleware(['permission:admin.destroy','role:superadmin'], ['only' => ['destroy'] ]);

    }

    public function index( UsersDataTable $dataTable)
    {
        return $dataTable->render('backend.admins.index');
    }

    public function create()
    {
        // $this->checkAuthorization(auth()->user(), ['admin.create']);

        $roles = Role::all();
        return view('backend.admins.create', compact('roles'));
    }

    public function store(storeUserRequest $request)
    {
        // $this->checkAuthorization(auth()->user(), ['admin.create']);

        // Create New Admin.
        $admin = new User();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }


        $type = 'success';
        $arr = [
            'message' => 'User saved successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Display the specified resource.
     */
    public function show( User $user)
    {
        return view('backend.admins.show', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function edit( User $user)
    {
        // $this->checkAuthorization(auth()->user(), ['admin.edit']);

        return view('backend.admins.edit', [
            'admin' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        // $this->checkAuthorization(auth()->user(), ['admin.edit']);

        // Update New Admin.
        $admin = User::find($id);


        $admin->name = $request->name;
        $admin->email = $request->email;
        // $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        } else {
            $admin->password = $admin->password;
        }
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        $type = 'success';
        $arr = [
            'message' => 'User has been updated.',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    public function destroy( User $user)
    {
        // $this->checkAuthorization(auth()->user(), ['admin.destroy']);

        // $admin = Admin::find($id);
        if (!$user) {
            $type = 'error';
        $arr = [
            'message' => 'User not found.',
        ];
        }

        $user->delete();

        $type = 'success';
        $arr = [
            'message' => 'User has been deleted.',
        ];
        return Qs::jsonResponse($type, $arr);
    }
}
