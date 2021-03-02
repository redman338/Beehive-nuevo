<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
   
   protected $fillable = [

   		'name',  'phone_1',
   		'phone_2', 'nit' ,
   		'email', 'copropiedad_id' , 'inmueble_id',
        'inmueble_name', 'user_id', 'registro_status',
        'politica_datos', 'tipo_identificacion',
        'date_autorization'  
   ];



}
