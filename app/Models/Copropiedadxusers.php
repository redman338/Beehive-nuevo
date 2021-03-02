<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copropiedadxusers extends Model
{
     protected $fillable = [
        'copropiedad_id', 'user_id', 'profile_id'
    ];


     public function copropiedad(){

        return $this->belongsTo(Copropiedad::class);
    }
}
