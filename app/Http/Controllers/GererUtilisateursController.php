<?php

namespace App\Http\Controllers;

use App\Droit;
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
        return view('utilisateurs.historique');
    }
}
