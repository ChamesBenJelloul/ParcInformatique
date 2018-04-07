<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    public function equipements(){
        return $this->hasMany('App\Equipement');
    }
}
