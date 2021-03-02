<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmueblexusers extends Model
{
       protected $fillable = [
	    
	    'copropiedad_id', 'user_id', 'inmueble_id'
    ];



     public function inmueble(){

        return $this->belongsTo(Inmueble::class);
    }

}
