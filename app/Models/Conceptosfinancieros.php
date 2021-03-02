<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conceptosfinancieros extends Model
{

   protected $fillable = [ 'name',  'description', 'copropiedad_id'];


    public function copropiedad(){

        return $this->belongsTo(Copropiedad::class);
    }

    public function scopeConcepto($query, $id){

        return $query->where('id', $id)->select('name');
    }

}
