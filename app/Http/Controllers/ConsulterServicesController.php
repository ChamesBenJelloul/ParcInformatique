<?php

namespace App\Http\Controllers;

use App\Equipement;
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
        return view('services.statistiques');
    }
    public function Showstatistiques(Request $request){
       $lava = new Lavacharts;
        $finances = \Lava::DataTable();
       if($request->element=="marque"){
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
        if($request->element=="type"){
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
        if($request->element=="utilisateur"){
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

    }
}
