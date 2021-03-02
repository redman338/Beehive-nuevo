<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'role','status', 'deleted_at',
        'nit','phone_2', 'phone_1',
        'address', 'department', 'city', 'file', 
        'contacto','name_legal', 
        'user_verified', 'pwd_temp',
        'tipo_identificacion', 'parent_id', 'deleted_at',        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){

        return $this->hasOne(App\Models\Profile::class);
    }


    public function roles(){

        return $this->belongsToMany(\Caffeinated\Shinobi\Models\Role::class);
    }


    public function inmuebles(){

        return $this->hasMany('App\Models\Inmueble');
    }



     public function scopeName($query, $name)
    {

        if($name)
        {

            return $query->where('name', 'LIKE', '%'.$name.'%');
        }
    }

    public function scopeNit($query, $nit)
    {

        if($nit)
        {

            return $query->where('nit', 'LIKE', '%'.$nit.'%');
        }
    }

    public function scopeEmail($query, $email)
    {

        if($email)
        {

            return $query->where('email', 'LIKE', '%' .$email.'%');
        }
    }


    public function scopeId($query, $id)
    {

        if($id)
        {

            return $query->where('id', '=', $id);
        }
    }


    public function posts(){
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }


    public function has($Model){
        if (count($this->$Model) > 0) return true;
        return false;
    }

    
     public function comments()
    {
        return $this->hasMany(Comments::class);
    }

     public function getPhoto($w = null, $h = null){
       
        if (!empty($this->file)){
            $path = $this->file;
        }else {
            $path = "social/images/profile-picture.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }


        public function getCover($w = null, $h = null){
        if (!empty($this->cover_path)){
            $path = 'storage/uploads/covers/'.$this->cover_path;
        }else {
            return "";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }


    public function canSeeProfile($user_id){
        if ($this->id == $user_id || !$this->isPrivate()) return true;
       

        $relation = 

        $this->follower()->where('follower_user_id', $user_id)->where('allow', 1)->get()->first();
       

        if ($relation){
            return true;
        }
        return false;
    }

     public function follower(){
        return $this->hasMany('App\Models\UserFollowing', 'following_user_id', 'id');
    }
}
