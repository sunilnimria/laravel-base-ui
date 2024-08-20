<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * Set the default guard for this model.
     *
     * @var string
     */
    protected $guard_name = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public static function getpermissionGroups()
    {
        $permission_groups = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }



    protected $appends = [
        'avatar'
    ];

    public function getAvatarAttribute()
    {
        // $obj = IssuedBook::where('book_id', '=', $this->id )
        // ->where('is_issued', '=', 1 )
        // ->get();
        // if ( isset($obj->first()->is_issued) ) {
        //     return false;
        // } else {
        return 'uploads/default/user.png';
        // }

    }

    public function defaultData(): array
    {
        return [
            [
                'name'     => "Super Admin",
                'email'    => "superadmin@example.com",
                'username' => "superadmin",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Admin",
                'email'    => "admin@example.com",
                'username' => "admin",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Teacher",
                'email'    => "teacher@example.com",
                'username' => "teacher",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Accountant",
                'email'    => "accountant@example.com",
                'username' => "accountant",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Clerk",
                'email'    => "clerk@example.com",
                'username' => "clerk",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Staff",
                'email'    => "staff@example.com",
                'username' => "staff",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Student",
                'email'    => "student@example.com",
                'username' => "student",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "Parent",
                'email'    => "parent@example.com",
                'username' => "parent",
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => "user",
                'email'    => "user@example.com",
                'username' => "user",
                'password' => Hash::make('12345678'),
            ],

        ];
    }
}
