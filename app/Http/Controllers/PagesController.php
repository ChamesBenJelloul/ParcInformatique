<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function gerer_equipements(){
        return view('pages.equipements');
    }
    public function consulter_services(){
        return view('pages.services');
    }
    public function gerer_utilisateurs(){
        return view('pages.utilisateurs');
    }
}
