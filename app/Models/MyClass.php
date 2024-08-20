<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyClass extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'class_type_id'];

    public function sections()
    {
        return $this->hasMany(Section::class,'my_class_id', 'id');
    }

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function student_record()
    {
        return $this->hasMany(Student::class);
    }
}
