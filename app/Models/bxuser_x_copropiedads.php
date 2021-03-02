<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bxuser_x_copropiedads extends Model
{
    protected $fillable = [

        'user_id',
        'cop_id',
        'cop_name',
        'parent_id',

    ];
}
