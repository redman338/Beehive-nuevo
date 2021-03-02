<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = [
        'user_id','name', 'email', 'nit','phone_2', 'phone_1', 'address', 'department', 'city', 'file', 'contacto','name_legal', 'tipo_identificacion', 'parent_id', 'deleted_at', 
    ];
}
