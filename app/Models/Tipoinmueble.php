<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoinmueble extends Model
{
      protected $fillable = [
        'name', 'description', 'copropiedad_id'
    ];
}
