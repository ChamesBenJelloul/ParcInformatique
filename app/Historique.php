<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function equipement(){
        return $this->belongsTo('App\Equipement');
    }
}
