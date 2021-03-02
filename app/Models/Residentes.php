<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residentes extends Model
{
   	

   	protected $table = 'residentes';


   protected $fillable = [

		'residente_1', 		'residente_1_cc', 'residente_1_phone_1',
		'residente_1_celular_1', 'email', 
		'residente_2',	'residente_2_cc',  'residente_2_phone_1','residente_2_celular_1',
		'vehiculo_tipo',	'vehiculo_marca',	'vehiculo_modelo',	'vehiculo_placa',
		'vehiculo_color',	'vehiculo_parqueadero',
		'colaborador_nombre', 'colaborador_direccionresidencia',
		'colaborador_phone_1',	'colaborador_celular',
		'colaborador_c_emergency',	'colaborador_c_phone_2',
		'colaborador_c_celular',
		'mascota_tipo',	'mascota_nombre',
		'mascota_raza',	'mascota_color',
		'user_id','inmueble_id', 
		'copropiedad_id', 'propietario_id'
   ];



}
