<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    public function personnel(){
        return $this->belongsTo('App\Personnel');
    }
    public function historiques(){
        return $this->hasMany('App\Historique');
    }
    public function isConfirmerParAdmin()
    {
        $equipements=Equipement::where('ConfirmerParAdmin','1')->get();
        foreach ($equipements as $equipement){
            if($this==$equipement){
                return true;
            }
        }
        return false;
    }
}
