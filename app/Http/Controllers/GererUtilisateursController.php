<?php

namespace App\Http\Controllers;

use App\Droit;
use App\Equipement;
use App\Historique;
use App\User;
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
        $users= User::has('Droits', '<=',6)->orderBy('username')->get();

        return view('utilisateurs.modifier')->with('users',$users);
    }
    public function modifierForm(Request $request){
        $user=User::find($request->utilisateur);
        $droits=$user->droits()->get();
        $droitbyid=array();
        for($i=0;$i<6;$i++){
            $droitbyid[$i]=0;
            foreach ($droits as $droit)
            {
                if($droit->id==$i+1)
                {
                    $droitbyid[$i]=1;
                }
            }
        }
        return view('utilisateurs.finalmodifier')->with('user',$user)->with('droitbyid',$droitbyid);
    }
    public function finalModifier(Request $request){
        $this->validate($request,[
            'username' => 'required'
        ]);
        $user=User::find($request->id);

        if($user->username!=$request->username)
        {
            $user2=User::where('username',$request->username)->first();
            if($user2){
                return redirect(url('/gerer_utilisateurs/Modifier'))->with('error','username existe déjà');
            }
            $user->username=$request->username;
        }
        $user->droits()->detach();
        for($i=1;$i<7;$i++)
        {
            if($request->{"droit".$i}){
                $droitx=Droit::where('id',$i)->first();
                $user->droits()->attach($droitx);
            }
        }
      $user->save();
        return redirect(url('/gerer_utilisateurs/Modifier'))->with('success','Modification effectué avec succés');
    }
    public function Supprimer(){
        $users= User::has('Droits', '<=',6)->orderBy('username')->get();
        return view('utilisateurs.supprimer')->with('users',$users);
    }
    public function finalSupprimer(Request $request){
        $user=User::find($request->utilisateur);
        $user->droits()->detach();
        $user->delete();
        return redirect('/gerer_utilisateurs/Supprimer')->with('success','Suppression effectué avec succés');
    }
    public function Historique(){
        $historiques=Historique::all();
        return view('utilisateurs.historique')->with('historiques',$historiques);
    }
    public function showHistorique($id){
        $historique=Historique::find($id);
        if (!strcmp($historique->action,"Ajout")||!strcmp($historique->action,"Suppression"))
        {
            return view('utilisateurs.showHistorique')->with('historique',$historique);
        }
        if(!strcmp($historique->action,"Modification")){
            $oldEquipement=Equipement::where('Numéro de série',$historique->equipement["Numéro de série"])->where('ConfirmerParAdmin','1')->first();
            return view('utilisateurs.showHistoriqueForModif')->with('historique',$historique)->with('oldEquipement',$oldEquipement);
        }
    }
    public function confirmer(Request $request,$id){
        $historique=Historique::find($id);
        if(!strcmp($historique->action,"Ajout")){
            $historique->ConfirmerParAdmin=1;
            $historique->equipement["ConfirmerParAdmin"]=1;
        }
        if(!strcmp($historique->action,"Suppression"))
        {
            $historique->ConfirmerParAdmin=1;
            $historique->equipement["ConfirmerParAdmin"]=0;
            //suppression va laisser l'equipement mais sans confirmation par l'admin
        }
    }
}
