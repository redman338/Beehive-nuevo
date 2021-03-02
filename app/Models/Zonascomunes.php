<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zonascomunes extends Model
{
    protected  $fillable = [
    			'name', 'file', 'copropiedad_id', 'disponible',
				'valorxhora', 'description', 'notas', 'slug'];



      
}
