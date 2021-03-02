<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{	

	 protected $fillable = [
     
     			'title',
     			'description',
     			'color',
     			'textColor',
     			'start', 
     			'start_time',
     			'end', 
     			'end_time',
     			'zonacomun_id',
     			'user_id',
     			'copropiedad_id', 
     			'inmueble_id', 
     			'reservastatus_id',
        ];


     public function zonacomun(){

           return $this->belongsTo(Zonascomunes::class);
     }

     public function reservastatus(){

           return $this->belongsTo(Reservastatus::class);
        
     }

     public function user(){

           return $this->belongsTo('App\User');
     }

    //   public function tipo($idtipo)
    //   {
    //     $resul=TipoUsuario::find($idtipo);
    //     if(isset($resul)){
    //      return $resul->nombre;
    //     }
    //     else
    //     {
    //       return "sin definir";
    //     }

    // } 
}
