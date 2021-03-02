<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Inmueble extends Model
{
    protected $fillable = [ 'name','description', 'tipoinmueble_id', 'bloque_id', 'copropiedad_id',  'user_id', 'parent_id'];




    public function copropiedad(){

        return $this->belongsTo(Copropiedad::class);
    }

    public function tipoinmueble(){

        return $this->belongsTo(Tipoinmueble::class);
    }

     public function user(){

        return $this->belongsTo('App\User');
    }


     public function invoices(){

        return $this->hasMany('App\Models\Invoice');
    }

     public function bloque(){

        return $this->belongsTo(Bloques::class);
    }

}
