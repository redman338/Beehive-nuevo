<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'user_id','copropiedad_id', 'has_image', 'content'
    ];


     public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\PostImage', 'post_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Models\PostComment', 'post_id', 'id');
    }

    public function likes(){
        return $this->hasMany('App\Models\PostLike', 'post_id', 'id');
    }


    public function getCommentCount(){
        if ($this->comment_count == null){
            $this->comment_count = $this->comments()->count();
        }
        return $this->comment_count;
    }


    public function getLikeCount(){
        if ($this->like_count == null){
            $this->like_count = $this->likes()->count();
        }
        return $this->like_count;
    }


     public function checkLike($user_id){
        if ($this->likes()->where('like_user_id', $user_id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }


    public function checkOwner($user_id){
        if ($this->user_id == $user_id)return true;
        return false;
    }


     public function hasImage(){
        return $this->has_image;
    }
}
