<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iteminvoice extends Model
{
   
   protected $fillable = [

   			'concepto_id', 'valor', 'iva', 'quantity', 'invoice_id', 'numero_doc'
   ];


    public function concepto(){

        return $this->belongsTo(Conceptosfinancieros::class);
    }
  
}
