<?php

namespace App\Http\Controllers;

use App\Droit;
use App\Equipement;
use App\Historique;
use App\Personnel;
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
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipement=new Equipement();
        $equipement["Numéro de série"]=$request->Numéro_de_série;
        $equipement["code patrimoine"]=$request->code_patrimoine;
        $equipement["nom"]=$request->nom;
        $equipement["marque"]=$request->marque;
        $equipement["type"]=$request->type;
        $equipement["code du marché"]=$request->code_du_marché;
        $equipement["numéro contrat de maintenance"]=$request->numéro_contrat_de_maintenance;
        $equipement["Contrat de maintenance détaillé"]=$request->Contrat_de_maintenance_détaillé;
        $personnel=Personnel::find($request->personnel);
        $equipement->personnel()->associate($personnel);
        //if(auth()->user()->id) //test sur admin //equipement existe deja? //relationships between user persoonel equipement historique
        $equipement->ConfirmerParAdmin=false;
        $equipement->save();
        $historique=new Historique();
        $testEquipement=new Equipement();
        $historique->action='Ajout';
        $historique->personnel_id=$request->personnel;
        $historique->user_id=auth()->user()->id;
        $testEquipement2=$testEquipement->where('Numéro de série',$request->Numéro_de_série)->first();
        $historique->equipement_id=$testEquipement2->id;
        $historique->bon_num=$request->Bon_de_sortie_d’immobilisation;
        $historique->ConfirmerParAdmin=false;
        $historique->save();
        return redirect(url('/gerer_equipements/Ajout'))->with('success','Ajout effectué avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
