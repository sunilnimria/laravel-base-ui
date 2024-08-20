<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name'
    ];


    public function states() {
        return $this->hasMany(State::class, 'country_id', 'country_id') ;
    }
}
