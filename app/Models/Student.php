<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, FileTrait, SoftDeletes;

    protected $fillable = [
        'admission_no', // Unique, Not Null
        'roll_no', // Nuulable
        'name', // Not Null
        'father_name', // Not Null
        'mother_name', // Not Null
        'my_parent_id', // Nullable ID
        'email', // Nullable
        'email_verified_at', //Nullable
        'mobile_no', // Not Null
        'password', // Not Null
        'gender', // Enum male/female/other
        'dob',  // Date Not Null
        'reg_date', // Date Not Null
        'reg_end_date', // Date Nullable
        'reg_class', // Not Null ID of My_classes
        'my_class_id', // Not Null ID of My_classes
        'section_id', // Not Null ID of Sections
        'house_no', // String Not Null
        'landmark', // String Not Null
        'city', // String Not Null
        'country_id', // ID of Countries Nullable
        'state_id', // ID of States Nullable
        'district_id', // ID of Districts Nullable
        'pin_code', //Postal Code Not Null
        'photo', // File ID nullable
        'blood_group', // ID of BloodGroups Nullable
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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function my_parent()
    {
        return $this->belongsTo(User::class);
    }

    public function regClass()
    {
        return $this->belongsTo(MyClass::class, 'reg_class', 'id');
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class, 'my_class_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function BloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group', 'id');
    }

    public function getPhotoAttribute()
    {
        $photoID =$this->attributes['photo'];
        $file = File::find($photoID);
        $return = $file->path . $file->slug ;
        return $return;
    }
    // public function getClassAttribute()
    // {
    //     $id = $this->attributes['my_class_id'];
    //     $return = MyClass::find($id);
    //     return $return;
    // }
    // public function getSectionNameAttribute()
    // {
    //     $id = $this->attributes['section_id'];
    //     $return = Section::find($id);
    //     return $return;
    // }

    // public function setSrnAttribute($value)
    // {
    //     $prevSRN = Student::whereRaw('srn = (select max(`srn`) from students)')->get();
    //     $srn = 1;

    //     $this->attributes['srn'] =  $srn;
    // }
}
