<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    public $timestamps = false;
    public function equipements(){
        return $this->hasMany('App\Equipement');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
