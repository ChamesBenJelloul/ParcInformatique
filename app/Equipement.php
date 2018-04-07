<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    public function personnel(){
        return $this->belongsTo('App\Personnel');
    }
}
