<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configfactura extends Model
{
   

    protected $fillable = ['copropiedad_id', 'year_id', 'month_id', 'daysinrecargo', 'dayrecargo'];



    public function year()
    {

        return $this->belongsTo('App\Models\Fiscalyear');
    }

    public function month()
    {

        return $this->belongsTo('App\Models\Month');
    }
}
