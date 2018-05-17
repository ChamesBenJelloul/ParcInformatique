<?php

namespace App\Http\Controllers;

use App\Droit;
use App\Equipement;
use App\Historique;
use App\Personnel;
use App\User;
use Illuminate\Http\Request;

class GererEquipementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajout()
    {
        $personnels=Personnel::orderBy('nom')->get();
        return view('equipements.ajout')->with('personnels',$personnels);
    }
    public function consulter()
    {
        $equipements=Equipement::where('ConfirmerParAdmin','1')->get();
        return view('equipements.consulter')->with('equipements',$equipements);
    }
    public function ConsulterParId(Request $request){
        $equipement=Equipement::where('Numéro de série',$request->Numéro_de_série)->where('ConfirmerParAdmin','1')->first();
        return view('equipements.consulterParId')->with('equipement',$equipement);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::find(auth()->user()->id);
        if($user->isAdmin()) {
            $messages = [
                'Numéro_de_série.required' => 'Numéro de série obligatoire.',
                'code_patrimoine.required' => 'Code patrimoine obligatoire.',
                'marque.required' => 'Marque obligatoire.',
                'type.required' => 'Type obligatoire.',
                'code_du_marché.required' => 'Code du marché obligatoire.',
                'personnel.required' => 'Personnel obligatoire.',
            ];
            $this->validate($request, [
                'Numéro_de_série' => 'required',
                'code_patrimoine' => 'required',
                'marque' => 'required',
                'type' => 'required',
                'code_du_marché' => 'required',
                'personnel' => 'required',
            ], $messages);
        }
        else{
            $messages = [
                'Numéro_de_série.required' => 'Numéro de série obligatoire.',
                'code_patrimoine.required' => 'Code patrimoine obligatoire.',
                'marque.required' => 'Marque obligatoire.',
                'type.required' => 'Type obligatoire.',
                'code_du_marché.required' => 'Code du marché obligatoire.',
                'personnel.required' => 'Personnel obligatoire.',
                'Bon_de_sortie_d’immobilisation.required' => 'Bon de sortie d’immobilisation obligatoire.',
            ];
            $this->validate($request, [
                'Numéro_de_série' => 'required',
                'code_patrimoine' => 'required',
                'marque' => 'required',
                'type' => 'required',
                'code_du_marché' => 'required',
                'personnel' => 'required',
                'Bon_de_sortie_d’immobilisation' => 'required',
            ], $messages);
        }
        $equipementExisteDeja=Equipement::where('Numéro de série',$request->Numéro_de_série)->where('Modification','0')->where('Suppression','0')->first();
        if($equipementExisteDeja){return redirect(url('/gerer_equipements/Ajout'))->with('error','Equipement existe déjà');}
        $equipement=new Equipement();
        $equipement["Numéro de série"]=$request->Numéro_de_série;
        $equipement["code patrimoine"]=$request->code_patrimoine;
        $equipement["nom"]=$request->nom;
        $equipement["marque"]=$request->marque;
        $equipement["type"]=$request->type;
        $equipement["code du marché"]=$request->code_du_marché;
        if($request->numéro_contrat_de_maintenance==""){$equipement["numéro contrat de maintenance"]="Optionnel";}
        else{$equipement["numéro contrat de maintenance"]=$request->numéro_contrat_de_maintenance;}
        if($request->Contrat_de_maintenance_détaillé==""){$equipement["Contrat de maintenance détaillé"]="Optionnel";}
        else{$equipement["Contrat de maintenance détaillé"]=$request->Contrat_de_maintenance_détaillé;}
        if($request->Adresse_Physique==""){$equipement["Adresse Physique"]="0";}
        else{$equipement["Adresse Physique"]=$request->Adresse_Physique;}
        $personnel=Personnel::find($request->personnel);
        $equipement->personnel()->associate($personnel);
        $user=User::find(auth()->user()->id);
        if($user->isAdmin())
        {$equipement->ConfirmerParAdmin=true;}
        else{$equipement->ConfirmerParAdmin=false;}
        $equipement->save();
        if(!$user->isAdmin())
        {
        $historique=new Historique();
        $testEquipement=new Equipement();
        $historique->action='Ajout';
        $historique->user_id=auth()->user()->id;
        $testEquipement2=$testEquipement->where('Numéro de série',$request->Numéro_de_série)->first();
        $historique->equipement_id=$testEquipement2->id;
        $historique->bon_num=$request->Bon_de_sortie_d’immobilisation;
        $historique->ConfirmerParAdmin=false;
        $historique->save();
        }
      if($user->isAdmin()) {
          return redirect(url('/gerer_equipements/Ajout'))->with('success', 'Ajout effectué avec succés');
      }
        return redirect(url('/gerer_equipements/Ajout'))->with('success',"Votre demande d'ajout est envoyée au administrateur pour la confirmation");
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Equipement::find($id)==null){return redirect(url('/gerer_equipements/Consulter'))->with('error','Equipement non trouvé');}
        $equipement=Equipement::find($id);
        if(!$equipement->isConfirmerParAdmin()){return redirect(url('/gerer_equipements/Consulter'))->with('error','Equipement non trouvé');}
        return view('equipements.show')->with('equipement',$equipement)->with('personnel',$equipement->personnel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier($id)
    {
        $equipement=Equipement::find($id);
        $personnels=Personnel::all();
        if(!$equipement->ConfirmerParAdmin){
            return redirect(url('/gerer_equipements/Consulter'))->with('error','Equipement non trouvé');
        }
        return view('equipements.modifier')->with('equipement',$equipement)->with('personnels',$personnels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'Numéro_de_série.required' => 'Numéro de série obligatoire.',
            'code_patrimoine.required' => 'Code patrimoine obligatoire.',
            'marque.required' => 'Marque obligatoire.',
            'type.required' => 'Type obligatoire.',
            'code_du_marché.required' => 'Code du marché obligatoire.',
            'personnel.required' => 'Personnel obligatoire.',
        ];
        $this->validate($request,[
            'Numéro_de_série' => 'required',
            'code_patrimoine' => 'required',
            'marque' => 'required',
            'type' => 'required',
            'code_du_marché' => 'required',
            'personnel' => 'required',
        ],$messages);
        $user=User::find(auth()->user()->id);
        if($user->isAdmin()){$equipement=Equipement::find($id);}
        else{$equipement=new Equipement();}
        $equipement["Numéro de série"]=$request->Numéro_de_série;
        $equipement["code patrimoine"]=$request->code_patrimoine;
        $equipement["nom"]=$request->nom;
        $equipement["marque"]=$request->marque;
        $equipement["type"]=$request->type;
        $equipement["code du marché"]=$request->code_du_marché;
        if($request->numéro_contrat_de_maintenance==""){$equipement["numéro contrat de maintenance"]="Optionnel";}
        else{$equipement["numéro contrat de maintenance"]=$request->numéro_contrat_de_maintenance;}
        if($request->Contrat_de_maintenance_détaillé==""){$equipement["Contrat de maintenance détaillé"]="Optionnel";}
        else{$equipement["Contrat de maintenance détaillé"]=$request->Contrat_de_maintenance_détaillé;}
        if($request->Adresse_Physique==""){$equipement["Adresse Physique"]="0";}
        else{$equipement["Adresse Physique"]=$request->Adresse_Physique;}
        $personnel=Personnel::find($request->personnel);
        if($request->personnel==$request->personnel_old) {
            if (!$user->isAdmin()) {
                $equipement->personnel()->associate($personnel);
            }
        }
        else {
            if($user->isAdmin()){
                $equipement->personnel()->dissociate();
                $equipement->personnel()->associate($personnel);
            }
            elseif ($request->num_bon==null){
                return redirect(url('/gerer_equipements/Consulter'))->with('error',"Pour modifier l'occupant il faut y avoir le numéro du Bon de transfert d’immobilisation");
            }
           else{
               $equipement->personnel()->associate($personnel);
           }
        }

        if($user->isAdmin())
        {$equipement->ConfirmerParAdmin=true;}
        else{$equipement->ConfirmerParAdmin=false;}
        $equipement->save();
        if(!$user->isAdmin())
        {
            $historique=new Historique();
            $historique->action='Modification';
            $historique->user_id=auth()->user()->id;
            $historique->equipement_id=$equipement->id;
            if($request->num_bon==null){$historique->bon_num='0';}
            else{$historique->bon_num=$request->num_bon;}
            $historique->ConfirmerParAdmin=false;
            $historique->save();
        }
        if($user->isAdmin()){
        return redirect(url('/gerer_equipements/Consulter'))->with('success','Modification effectué avec succés');
        }
        return redirect(url('/gerer_equipements/Consulter'))->with('success','Votre demande de modification est envoyée au administrateur pour la confirmation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Equipement::find($id) == null) {
            return redirect(url('/gerer_equipements/Consulter'))->with('error', 'Equipement non trouvé');
        }
        $equipement = Equipement::find($id);
        if($equipement->ConfirmerParAdmin==0)
        {return redirect(url('/gerer_equipements/Consulter'))->with('error', 'Equipement non trouvé');}
        $user=User::find(auth()->user()->id);
        if($user->isAdmin()){
            $equipement->delete();
            return redirect(url('/gerer_equipements/Consulter'))->with('success','Suppression effectué avec succés');
        }
        $historique=new Historique();
        $historique->action='Suppression';
        $historique->user_id=auth()->user()->id;
        $historique->equipement_id=$equipement->id;
        $historique->bon_num=0;
        $historique->ConfirmerParAdmin=false;
        $historique->save();
        return redirect(url('/gerer_equipements/Consulter'))->with('success','Votre demande de suppression est envoyée au administrateur pour la confirmation');
    }
}
