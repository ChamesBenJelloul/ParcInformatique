<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GererUtilisateursController extends Controller
{
    public function index(){
        return view('utilisateurs.index');
    }
    public function Ajout(){
        return view('utilisateurs.ajout');
    }
    public function Modifier(){
        return view('utilisateurs.modifier');
    }
    public function Supprimer(){
        return view('utilisateurs.supprimer');
    }
    public function Historique(){
        return view('utilisateurs.historique');
    }
}
