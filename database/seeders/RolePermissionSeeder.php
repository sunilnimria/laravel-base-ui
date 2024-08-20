<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as ModelsPermission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission List as array
        $role = new Role();
        $perMission = new Permission();
        $permissions = $perMission->defaultData();

        // Do same for the admin guard for tutorial purposes.
        $admin = User::where('username', 'superadmin')->first();
        $roleSuperAdmin = $this->maybeCreateSuperAdminRole($admin);


        // Assign super admin role permission to superadmin user
        $users = User::all();
        foreach ($users as $user) {
            $role = Role::where('name', $user->username)->where('guard_name', 'user')->first();
            if ( $role ){
                $user->assignRole($role);
            }
        }


        $permissions = ModelsPermission::all();
        $roleSuperAdmin = $this->maybeCreateSuperAdminRole($admin);
        // Assign Permissions to SuperAdmin Role
        foreach ($permissions as $permission) {
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }





    }

    private function maybeCreateSuperAdminRole($admin): Role
    {
        if (is_null($admin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'user']);
        } else {
            $roleSuperAdmin = Role::where('name', 'superadmin')->where('guard_name', 'user')->first();
        }

        if (is_null($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'user']);
        }

        return $roleSuperAdmin;
    }

}
