<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [

        'comment_user_id','post_id', 'comment', 
    ];

    public function user(){
        return $this->belongsTo('App\User', 'comment_user_id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
