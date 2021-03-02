<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copropiedad extends Model
{
  protected $fillable = [ 'name','address', 'city', 'department', 'location',
            'phone_1', 'phone_2',  'file', 'tipocopropiedad_id',
            'description', 'tipoadministracion_id',
            'user_id',  'status_id',
            'deleted_at', 'parent_id' ,'country', 'codigo',
            'num_doc_seq',
            'area_privada',
            'area_comun', 'area_total',
            ];



    public function tipocopropiedad(){

        return $this->BelongsTo(Tipocopropiedad::class);
    }

     public function inmuebles(){

        return $this->hasMany(Models\Inmueble::class);
    }


    public function user(){

        return $this->BelongsTo('App\User');
    }


    public function scopeName($query, $name)
    {

        if($name)
        {

            return $query->where('name', 'LIKE', '%'.$name.'%');
        }
    }

    public function scopeId($query, $id)
    {

        if($id)
        {

            return $query->where('id', '=', $id);
        }
    }



}
