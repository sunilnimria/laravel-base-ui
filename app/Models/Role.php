<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function defaultData(): array
    {
        return [
            [
                'name' => 'superadmin',
                'guard_name' => 'user'
            ],
            [
                'name' => 'admin',
                'guard_name' => 'user'
            ],
            [
                'name' => 'teacher',
                'guard_name' => 'user'
            ],
            [
                'name' => 'accountant',
                'guard_name' => 'user'
            ],
            [
                'name' => 'clerk',
                'guard_name' => 'user'
            ],
            [
                'name' => 'staff',
                'guard_name' => 'user'
            ],
            [
                'name' => 'parent',
                'guard_name' => 'user'
            ],
            [
                'name' => 'student',
                'guard_name' => 'user'
            ],
            [
                'name' => 'user',
                'guard_name' => 'user'
            ],
        ];
    }
}
