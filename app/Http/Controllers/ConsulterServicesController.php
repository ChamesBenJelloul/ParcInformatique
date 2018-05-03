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
        $startdate=strtotime("tomorrow");
        $dt0=date("Y-m-d", $startdate);
        if($request->critere2=="Avant 6 mois"){
            $date1=strtotime("-1 months", $startdate);
            $dt1=date("Y-m-d", $date1) ;
            $date2=strtotime("-1 months", $date1);
            $dt2=date("Y-m-d", $date2) ;
            $date3=strtotime("-1 months", $date2);
            $dt3=date("Y-m-d", $date3) ;
            $date4=strtotime("-1 months", $date3);
            $dt4=date("Y-m-d", $date4) ;
            $date5=strtotime("-1 months", $date4);
            $dt5=date("Y-m-d", $date5) ;
            $date6=strtotime("-1 months", $date5);
            $dt6=date("Y-m-d", $date6) ;
        }
        if($request->critere2=="Avant 12 mois"){
            $date1=strtotime("-2 months", $startdate);
            $dt1=date("Y-m-d", $date1) ;
            $date2=strtotime("-2 months", $date1);
            $dt2=date("Y-m-d", $date2) ;
            $date3=strtotime("-2 months", $date2);
            $dt3=date("Y-m-d", $date3) ;
            $date4=strtotime("-2 months", $date3);
            $dt4=date("Y-m-d", $date4) ;
            $date5=strtotime("-2 months", $date4);
            $dt5=date("Y-m-d", $date5) ;
            $date6=strtotime("-2 months", $date5);
            $dt6=date("Y-m-d", $date6) ;
        }
        if($request->critere2=="Avant 24 mois"){
            $date1=strtotime("-4 months", $startdate);
            $dt1=date("Y-m-d", $date1) ;
            $date2=strtotime("-4 months", $date1);
            $dt2=date("Y-m-d", $date2) ;
            $date3=strtotime("-4 months", $date2);
            $dt3=date("Y-m-d", $date3) ;
            $date4=strtotime("-4 months", $date3);
            $dt4=date("Y-m-d", $date4) ;
            $date5=strtotime("-4 months", $date4);
            $dt5=date("Y-m-d", $date5) ;
            $date6=strtotime("-4 months", $date5);
            $dt6=date("Y-m-d", $date6) ;
        }
        if($request->element=="equipement" && $request->critere==""){
            $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr, nom'))->where('ConfirmerParAdmin','1')->groupBy('nom')->get();

            $finances->addStringColumn('Equipement')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->nom,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les équipements les plus utilisés',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }

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
                'title' => 'les types d\'équipement les plus utilisés',
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
        if($request->element=="nbr_equi" && $request->critere==""){
            $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr'))->where('ConfirmerParAdmin','1')->get();
            $startdate=strtotime("today");
            $mydate=date("Y-m-d", $startdate);
            $finances->addStringColumn('Equipements')
                ->addNumberColumn('nombre d\'équipements');
                $finances->addRow([$mydate,  $req1->nbr]);
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'Nombre d\'équipements en total',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="nbr_utili" && $request->critere==""){
            $req1=User::has('Droits','<',7)->count();
            $startdate=strtotime("today");
            $mydate=date("Y-m-d", $startdate);
            $finances->addStringColumn('Utilisateurs')
                ->addNumberColumn('nombre d\'utilisateurs');
                $finances->addRow([$mydate,  $req1]);
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'Nombre d\'utilisateurs en total',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="nbr_admin" && $request->critere==""){
            $req1=User::has('Droits',7)->count();
            $startdate=strtotime("today");
            $mydate=date("Y-m-d", $startdate);
            $finances->addStringColumn('Administrateurs')
                ->addNumberColumn('nombre d\'administrateurs');
            $finances->addRow([$mydate,  $req1]);
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'Nombre d\'administrateurs en total',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="equipement" && $request->critere=="temps")
        {$reqs=DB::table('equipements')->select('nom')->distinct()->get();
            for ($j=0;$j<7;$j++){
                $i=0;
                foreach ($reqs as $req){
                    ${"req".$i.$j}=DB::table('equipements')->where('created_at','<=',${"dt".$j})
                        ->select(DB::raw('count(*) as nbr'))->where('ConfirmerParAdmin','1')
                        ->where('nom',$req->nom)->get();
                    $i++;
                }
            }
            $finances->addDateColumn('Date');
            foreach ($reqs as $req) {
                $finances->addNumberColumn($req->nom);
            }

            $tab=array();
            for ($n=6;$n>=0;$n-=1)
            {
                for($m=0;$m<($i+1);$m++){
                    if ($m==0){
                        $tab[$n][$m]=${"dt".$n};
                    }
                    else{
                        $tab[$n][$m]=${"req".($m-1).$n}[0]->nbr;
                    }
                }
                $finances->addRow($tab[$n]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Les équipements les plus utilisées '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));

        }
        if($request->element=="marque" && $request->critere=="temps"){

            $reqs=DB::table('equipements')->select('marque')->distinct()->get();
            for ($j=0;$j<7;$j++){
            $i=0;
            foreach ($reqs as $req){
                ${"req".$i.$j}=DB::table('equipements')->where('created_at','<=',${"dt".$j})
                    ->select(DB::raw('count(*) as nbr'))->where('ConfirmerParAdmin','1')
                    ->where('marque',$req->marque)->get();
                $i++;
            }
            }
            $finances->addDateColumn('Date');
            foreach ($reqs as $req) {
                $finances->addNumberColumn($req->marque);
            }

            $tab=array();
            for ($n=6;$n>=0;$n-=1)
            {
            for($m=0;$m<($i+1);$m++){
                if ($m==0){
                $tab[$n][$m]=${"dt".$n};
                }
                else{
                  $tab[$n][$m]=${"req".($m-1).$n}[0]->nbr;
                }
                }
                $finances->addRow($tab[$n]);
            }

              \LAVA::LineChart('Temps', $finances, [
                'title' => 'Les marques d\'équipement les plus utilisées '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));








        }
        if($request->element=="type" && $request->critere=="temps"){
            $reqs=DB::table('equipements')->select('type')->distinct()->get();
            for ($j=0;$j<7;$j++){
                $i=0;
                foreach ($reqs as $req){
                    ${"req".$i.$j}=DB::table('equipements')->where('created_at','<=',${"dt".$j})
                        ->select(DB::raw('count(*) as nbr'))->where('ConfirmerParAdmin','1')
                        ->where('type',$req->type)->get();
                    $i++;
                }
            }
            $finances->addDateColumn('Date');
            foreach ($reqs as $req) {
                $finances->addNumberColumn($req->type);
            }

            $tab=array();
            for ($n=6;$n>=0;$n-=1)
            {
                for($m=0;$m<($i+1);$m++){
                    if ($m==0){
                        $tab[$n][$m]=${"dt".$n};
                    }
                    else{
                        $tab[$n][$m]=${"req".($m-1).$n}[0]->nbr;
                    }
                }
                $finances->addRow($tab[$n]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Les types d\'équipement les plus utilisés '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));
        }
        if($request->element=="utilisateur" && $request->critere=="temps"){
            $reqs=DB::table('historiques')->select('username')
            ->join('users', 'historiques.user_id', '=', 'users.id')->distinct()->get();
            for ($j=0;$j<7;$j++){
                $i=0;
                foreach ($reqs as $req){
                    ${"req".$i.$j}=DB::table('historiques')->where('historiques.created_at','<=',${"dt".$j})
                        ->select(DB::raw('count(*) as nbr'))->join('users', 'historiques.user_id', '=', 'users.id')
                        ->where('username',$req->username)->get();
                    $i++;
                }
            }
            $finances->addDateColumn('Date');
            foreach ($reqs as $req) {
                $finances->addNumberColumn($req->username);
            }

            $tab=array();
            for ($n=6;$n>=0;$n-=1)
            {
                for($m=0;$m<($i+1);$m++){
                    if ($m==0){
                        $tab[$n][$m]=${"dt".$n};
                    }
                    else{
                        $tab[$n][$m]=${"req".($m-1).$n}[0]->nbr;
                    }
                }
                $finances->addRow($tab[$n]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Les utilisateurs les plus actifs '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));
        }
        if($request->element=="nbr_equi" && $request->critere=="temps")
        {
            for ($j=0;$j<7;$j++){
                    ${"req".$j}=DB::table('equipements')->select(DB::raw('count(*) as nbr'))
                        ->where('ConfirmerParAdmin','1')->where('created_at','<=',${"dt".$j})->get();

            }
            $finances->addDateColumn('Date');
                $finances->addNumberColumn('nombre d\'équipements');

            for ($n=6;$n>=0;$n-=1)
            {
                        $mydate=${"dt".$n};
                        $req=${"req".$n}[0]->nbr;

                $finances->addRow([$mydate,$req]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Nombre d\'équipements '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));
        }
        if($request->element=="nbr_utili" && $request->critere=="temps")
        {
            for ($j=0;$j<7;$j++){
                ${"req".$j}=User::where('created_at','<=',${"dt".$j})->has('Droits','<',7)->count();

            }
            $finances->addDateColumn('Date');
            $finances->addNumberColumn('nombre d\'utilisateurs');

            for ($n=6;$n>=0;$n-=1)
            {
                $mydate=${"dt".$n};
                $req=${"req".$n};

                $finances->addRow([$mydate,$req]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Nombre d\'utilisateurs '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));
        }
        if($request->element=="nbr_admin" && $request->critere=="temps")
        {
            for ($j=0;$j<7;$j++){
                ${"req".$j}=User::where('created_at','<=',${"dt".$j})->has('Droits',7)->count();

            }
            $finances->addDateColumn('Date');
            $finances->addNumberColumn('nombre d\'administrateurs');

            for ($n=6;$n>=0;$n-=1)
            {
                $mydate=${"dt".$n};
                $req=${"req".$n};

                $finances->addRow([$mydate,$req]);
            }

            \LAVA::LineChart('Temps', $finances, [
                'title' => 'Nombre d\'administrateurs '.$request->critere2
            ]);
            return view('services.Showstatistiques2',compact('lava'));
        }
        if($request->element=="equipement" && $request->critere=="Occupant"){
            $ch1= strtok($request->critere2, " ");
            $ch2= strtok($request->critere2, " ");
            $req=Personnel::where('nom',$ch1)->where('prenom',$ch2)->first();
            $req1=DB::table('equipements')->where('personnel_id',$req->id)->select(DB::raw('count(*) as nbr, nom'))->where('ConfirmerParAdmin','1')->groupBy('nom')->get();

            $finances->addStringColumn('Equipement')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->nom,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les équipements les plus utilisés pour '.$ch1.' '.$ch2,
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }

        if($request->element=="marque" && $request->critere=="Occupant"){
            $ch1= strtok($request->critere2, " ");
            $ch2= strtok($request->critere2, " ");
            $req=Personnel::where('nom',$ch1)->where('prenom',$ch2)->first();
            $req1=DB::table('equipements')->where('personnel_id',$req->id)->select(DB::raw('count(*) as nbr, marque'))->where('ConfirmerParAdmin','1')->groupBy('marque')->get();

            $finances->addStringColumn('Marque')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->marque,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les marques d\'équipement les plus utilisées pour '.$ch1.' '.$ch2,
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="type" && $request->critere=="Occupant"){
            $ch1= strtok($request->critere2, " ");
            $ch2= strtok($request->critere2, " ");
            $req=Personnel::where('nom',$ch1)->where('prenom',$ch2)->first();
            $req1=DB::table('equipements')->where('personnel_id',$req->id)->select(DB::raw('count(*) as nbr, type'))->where('ConfirmerParAdmin','1')->groupBy('type')->get();

            $finances->addStringColumn('Type')
                ->addNumberColumn('nombre d\'équipements');
            foreach ($req1 as $req11){
                $finances->addRow([$req11->type,  $req11->nbr]);
            }
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'les types d\'équipement les plus utilisés pour '.$ch1.' '.$ch2,
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));
        }
        if($request->element=="utilisateur" && $request->critere=="Occupant"){

            return redirect('/consulter_services/Statistiques')->with('error');
        }
        if($request->element=="nbr_equi" && $request->critere=="Occupant"){
            $ch1= strtok($request->critere2, " ");
            $ch2= strtok($request->critere2, " ");
            $req=Personnel::where('nom',$ch1)->where('prenom',$ch2)->first();
            $req1=DB::table('equipements')->select(DB::raw('count(*) as nbr'))->where('personnel_id',$req->id)
                ->where('ConfirmerParAdmin','1')->get();
            $finances->addStringColumn('Equipements')
                ->addNumberColumn('nombre d\'équipements ');
            $finances->addRow([$ch1." ".$ch2,  $req1[0]->nbr]);
            \LAVA::ColumnChart('Finances', $finances, [
                'title' => 'Nombre d\'équipements en total pour '.$ch1." ".$ch2 ,
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            return view('services.Showstatistiques',compact('lava'));

        }
        if($request->element=="nbr_utili" && $request->critere=="Occupant"){

            return redirect('/consulter_services/Statistiques')->with('error');
        }
        if($request->element=="nbr_admin" && $request->critere=="Occupant"){

            return redirect('/consulter_services/Statistiques')->with('error');
        }

    }
}
