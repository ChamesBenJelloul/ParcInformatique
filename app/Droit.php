<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','user_droit','droit_id','user_id');
    }
}
