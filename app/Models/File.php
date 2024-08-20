<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'disk',
        'path',
        'ext',
        'size',
        'alt',
        'caption',
        'uploaded_by',
        'status',
    ];


    protected $casts = [
        // 'author_id' => 'integer',
        // 'cat_id' => 'integer',
        // 'book_no' => 'integer',
        // 'book_price' => 'integer'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'categories'
    ];

    public function getCategoriesAttribute()
    {
        // $obj = IssuedBook::where('book_id', '=', $this->id )
        // ->where('is_issued', '=', 1 )
        // ->get();
        // if ( isset($obj->first()->is_issued) ) {
        //     return false;
        // } else {
        return 25;
        // }

        return ucwords($this->attributes['Categories'], ' ');
    }

    public function getNameAttribute()
    {
        return ucwords($this->attributes['name'], ' ');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  ucwords(str_replace('-', ' ', str_replace('_', ' ', $value)));
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(' ', '-', $value));
    }
    public static function filterName($value)
    {
        return  ucwords(str_replace('-', ' ', str_replace('_', ' ', $value)));
    }

    public static function filterSlug($value)
    {
        return preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(' ', '-', $value));
    }

    public function getDescriptionAttribute()
    {
        return html_entity_decode($this->attributes['description']);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] =  htmlentities($value);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'featured_img', 'id');
    }
}
