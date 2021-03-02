<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     protected $fillable = [  

     	'numero_doc', 'copropiedad_id', 'inmueble_id',
     	'year_id' ,'month_id' ,'daysinrecargo',
     	'dayrecargo' , 'subtotal','total', 'status_id', 

        ];

    public function copropiedad(){

        return $this->belongsTo(Copropiedad::class);
    }

    public function inmueble(){

        return $this->belongsTo(Inmueble::class);
    }

    
     public function year(){

        return $this->belongsTo(Fiscalyear::class);
    }

     public function month(){

        return $this->belongsTo(Month::class);
    }

    public function status(){

        return $this->belongsTo(InvoiceStatus::class);
    }

     public function scopeCopropiedad($query, $cop_id)
    {

        if($cop_id)
        {

            return $query->where('copropiedad_id', '=', $cop_id);
        }
    }

    public function scopeInmueble($query, $inmueble_id)
    {

        if($inmueble_id)
        {

            return $query->where('inmueble_id', '=', $inmueble_id);
        }
    }

    public function scopeYear($query, $year_id)
    {

        if($year_id)
        {

            return $query->where('year_id', '=', $year_id);
        }
    }

    public function scopeMonth($query, $month_id)
    {

        if($month_id)
        {

            return $query->where('month_id', '=', $month_id);
        }
    }

     public function scopeDocumento($query, $numero_doc)
    {

        if($numero_doc)
        {

            return $query->where('numero_doc', '=', $numero_doc);
        }
    }
}
