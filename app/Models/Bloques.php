<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloques extends Model
{
    protected $fillable = [ 'name','description', 'copropiedad_id'];


      public function copropiedad(){

        return $this->belongsTo(Copropiedad::class);
    }
}
