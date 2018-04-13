<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function droits(){
        return $this->belongsToMany('App\Droit','user_droit','user_id','droit_id');
    }
    public function personnel(){
        return $this->belongsTo('App\Personnel');
    }
    public function hasAnyRole($roles){
     if(is_array($roles)){
         foreach ($roles as $role){
             if($this->hasRole($role)){
                 return true;
             }
         }
     } else {
         if ($this->hasRole($roles)) {
             return true;
         }
     }
     return false;
     }


    public function hasRole($role){
        if($this->droits()->where('nom',$role)->first()){
            return true;
        }
        return false;
    }

}
