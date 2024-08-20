<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use App\Models\User;
use App\DataTables\RolesDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Repositories\RoleRepo;
use App\Models\Role as ModelRole;

class RolesController extends Controller
{
    public $roles;

    public function __construct(RoleRepo $roles)
    {
        $this->middleware(['permission:role.view'], ['only' => ['index', 'ajaxIndex']]);
        $this->middleware(['permission:role.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role.view'], ['only' => ['show']]);
        $this->middleware(['permission:role.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role.destroy', 'role:superadmin'], ['only' => ['destroy']]);

        $this->roles = $roles;
    }

    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('backend.roles.index');
    }

    public function create()
    {
        return view('backend.roles.create', [
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        // Process Data.
        $role = Role::create(['name' => $request->name, 'guard_name' => 'user']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $type = 'success';
        $arr = [
            'message' => 'Role saved successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.roles.show', [
            'role' => Role::findById($id, 'user'),
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
        ]);
    }

    public function edit(int $id)
    {
        return view('backend.roles.edit', [
            'role' => Role::findById($id, 'user'),
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
        ]);
    }

    public function update(UpdateRoleRequest $request, int $id)
    {

        $role = Role::findById($id, 'user');
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        $type = 'success';
        $arr = [
            'message' => 'Role updated successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    public function destroy(int $id)
    {
        $role = ModelRole::find($id);
        if (!$role) {
            $type = 'error';
            $arr = [
                'message' => 'Role not found.',
            ];
        } else {

            if ($role->name == 'superadmin') {
                $type = 'error';
                $arr = [
                    'message' => 'You can not delete Super Admin Role.',
                ];
            } else {

                $role->delete();

                $type = 'deleted';
                $arr = [
                    'message' => 'Post deleted successfully',
                ];
            }
        }

        return Qs::jsonResponse($type, $arr);
    }
}
