<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GererEquipementsController extends Controller
{
    public function index(){
        return view('equipements.index');
    }
    public function Ajout(){
        return view('equipements.ajout');
    }
    public function Modifier(){
        return view('equipements.modifier');
    }
    public function Consulter(){
        return view('equipements.consulter');
    }
    public function Supprimer(){
        return view('equipements.supprimer');
    }
}
