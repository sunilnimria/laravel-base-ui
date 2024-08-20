<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'my_class_id', 'active', 'teacher_id'];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class, 'my_class_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }

    public function student_record()
    {
        return $this->hasMany(Student::class);
    }
}
