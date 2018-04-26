<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    public $timestamps = false;
    public function user(){
        return $this->hasOne('App\User');
    }
    public function historiques(){
        return $this->hasMany('App\Historique');
    }
}
