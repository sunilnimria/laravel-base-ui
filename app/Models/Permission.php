<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function defaultData() :array
    {
        return [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'post',
                'permissions' => [
                    // Post Permissions
                    'post.create',
                    'post.view',
                    'post.edit',
                    'post.destroy',
                    'post.approve',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [
                    // Category Permissions
                    'category.create',
                    'category.view',
                    'category.edit',
                    'category.destroy',
                    'category.approve',
                ]
            ],
            [
                'group_name' => 'tag',
                'permissions' => [
                    // Tag Permissions
                    'tag.create',
                    'tag.view',
                    'tag.edit',
                    'tag.destroy',
                    'tag.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.destroy',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.destroy',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                    'profile.destroy',
                    'profile.update',
                ]
            ],
            [
                'group_name' => 'class',
                'permissions' => [
                    // Class Permissions
                    'class.create',
                    'class.view',
                    'class.edit',
                    'class.destroy',
                    'class.update',
                    'class.approve',
                ]
            ],
            [
                'group_name' => 'section',
                'permissions' => [
                    // Section Permissions
                    'section.create',
                    'section.view',
                    'section.edit',
                    'section.destroy',
                    'section.update',
                    'section.approve',
                ]
            ],
            [
                'group_name' => 'student',
                'permissions' => [
                    // Section Permissions
                    'student.create',
                    'student.view',
                    'student.edit',
                    'student.destroy',
                    'student.update',
                    'student.approve',
                ]
            ],
            [
                'group_name' => 'subject',
                'permissions' => [
                    // Subject Permissions
                    'subject.create',
                    'subject.view',
                    'subject.edit',
                    'subject.destroy',
                    'subject.update',
                    'subject.approve',
                ]
            ],
        ];
    }
}
