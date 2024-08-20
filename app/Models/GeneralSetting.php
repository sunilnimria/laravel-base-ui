<?php

namespace App\Models;

use App\Helpers\Qs;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
    use HasFactory, FileTrait;

    protected $table = 'general_settings';

    protected $fillable = [
        'option_name',
        'option_value',
    ];


    public function defaultData() :array
    {
        return [
            [
                'option_name'   => 'logo',
                'option_value'  => Qs::getDefaultImage('logo.png')
            ],
            [
                'option_name'   => 'theme_color',
                'option_value'  => '#0069D9'
            ],
            [
                'option_name'   => 'fevicon',
                'option_value'  => Qs::getDefaultImage('fevicon.png')
            ],
            [
                'option_name'   => 'title',
                'option_value'  => 'News Blog'
            ],
            [
                'option_name'   => 'copyright',
                'option_value'  => 'Copyright © 2023'
            ],
            [
                'option_name'   => 'email',
                'option_value'  => 'admin@gmail.com'
            ],
            [
                'option_name'   => 'description',
                'option_value'  => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.'
            ],
        ];
    }
}
