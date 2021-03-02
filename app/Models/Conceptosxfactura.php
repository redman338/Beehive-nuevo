<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conceptosxfactura extends Model
{
    protected $fillable = ['copropiedad_id', 'configfactura_id', 'concepto_id', 'valor'];
}
