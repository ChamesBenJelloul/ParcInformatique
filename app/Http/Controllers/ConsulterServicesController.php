<?php

namespace App\Http\Controllers;

use App\Equipement;
use App\Personnel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class ConsulterServicesController extends Controller
{
    public function index(){
        return view('services.index');
    }
    public function TableauxDeBords(){
        return view('services.tableauxdebords');
    }
    public function Statistiques(){
        $personnels=Personnel::all();
        return view('services.statistiques')->with('personnels',$personnels);
    }
    public function Showstatistiques(Request $request){
       $lava = new Lavacharts;
        $finances = \Lava::DataTable();
       if($request->element=="marque" && $request->critere==""){
           $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr, marque'))->where('ConfirmerParAdmin','1')->groupBy('marque')->get();

        $finances->addStringColumn('Marque')
            ->addNumberColumn('nombre d\'équipements');
        foreach ($req1 as $req11){
        $finances->addRow([$req11->marque,  $req11->nbr]);
        }
        \LAVA::ColumnChart('Finances', $finances, [
            'title' => 'les marques d\'équipement les plus utilisées',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
           return view('services.Showstatistiques',compact('lava'));
       }
        if($request->element=="type" && $request->critere==""){
            $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr, type'))->where('ConfirmerParAdmin','1')->groupBy('type')->get();

            $finances->addStringColumn('Type')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->type,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les types d\'équipement les plus utilisées',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="utilisateur" && $request->critere==""){
            $req1=DB::table('historiques')->join('users', 'historiques.user_id', '=', 'users.id')->select(DB::raw('count(*) as nbr, username'))->groupBy('user_id')->get();
            $finances->addStringColumn('utilisateur')
                ->addNumberColumn('nombre des opérations');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->username,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les utilisateurs les plus actifs',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="marque" && $request->critere=="temps"){
            return 123;
        }
        if($request->element=="type" && $request->critere=="temps"){
            return 123;
        }
        if($request->element=="utilisateur" && $request->critere=="temps"){
            return 123;
        }
        if($request->element=="marque" && $request->critere=="Occupant"){

            $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr, marque'))->where('ConfirmerParAdmin','1')->groupBy('marque')->get();

            $finances->addStringColumn('Marque')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->marque,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les marques d\'équipement les plus utilisées',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="type" && $request->critere=="Occupant"){
            return 1234;
        }
        if($request->element=="utilisateur" && $request->critere=="Occupant"){
            $equipement=Equipement::where('nom prenom',$request->critere2)->get();
            return $equipement;
        }


    }
}
