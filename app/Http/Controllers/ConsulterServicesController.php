<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsulterServicesController extends Controller
{
    public function index(){
        return view('services.index');
    }
    public function TableauxDeBords(){
        return view('services.tableauxdebords');
    }
    public function Statistiques(){
        return view('services.statistiques');
    }
}
