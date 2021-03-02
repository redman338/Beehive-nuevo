<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
     protected $fillable = [

   			'copropiedad_id', 'name_copropiedad', 'slug', 'url_logo', 'url_banner', 'url_card_1',

   			'url_card_2', 'url_card_3', 'url_card_4', 'description', 'info', 'contact'
   ];
}
