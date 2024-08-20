<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all($id) {
        return Role::find($id);
    }
    public function findAll($id) {
        return Role::findById($id, 'user');
    }
}
