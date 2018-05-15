@extends('layouts.newapp')

@section('content')
    {!! Form::open(['action' => ['GererUtilisateursController@confirmer',$historique->id], 'method' => 'POST']) !!}
    <div class="container">
        <table class="table">
            <tr><td>Date</td><td>{{$historique->created_at}}</td></tr>
            <tr><td>Action</td><td>{{$historique->action}}</td></tr>
            <tr><td>Utilisateur</td><td>{{$historique->user["username"]}}</td></tr>
            <tr><td>Bon de transfert d'immobilisation</td><td>{{$historique->bon_num}}</td></tr>
        </table>
        <div align="center" class="form-group">
            @if($historique->equipement['nom']=="Unité Centrale")<img src="{{asset('img/Unité Centrale.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Ecran")<img src="{{asset('img/Ecran.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Imprimante")<img src="{{asset('img/Imprimante.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Scanner")<img src="{{asset('img/Scanner.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Ordinateur Portable")<img src="{{asset('img/Ordinateur Portable.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="consommables")<img src="{{asset('img/consommables.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Switch")<img src="{{asset('img/Switch.png')}}" width="70" height="70">@endif
            @if($historique->equipement['nom']=="Routeur")<img src="{{asset('img/Routeur.png')}}" width="70" height="70">@endif
        </div>
        <table class="table">
            <tr><td> </td><td>Equipement Avant Modif</td><td>Equipement Aprés Modif</td></tr>
            <tr><td>Numéro de série</td><td>{{$oldEquipement["Numéro de série"]}}</td><td>{{$historique->equipement["Numéro de série"]}}</td></tr>
            <tr><td>Code patrimoine</td><td>{{$oldEquipement["code patrimoine"]}}</td><td>{{$historique->equipement["code patrimoine"]}}</td></tr>
            <tr><td>Nom</td><td>{{$oldEquipement["nom"]}}</td><td>{{$historique->equipement["nom"]}}</td></tr>
            <tr><td>Marque</td><td>{{$oldEquipement["marque"]}}</td><td>{{$historique->equipement["marque"]}}</td></tr>
            <tr><td>Type</td><td>{{$oldEquipement["type"]}}</td><td>{{$historique->equipement["type"]}}</td></tr>
            <tr><td>Code du marché</td><td>{{$oldEquipement["code du marché"]}}</td><td>{{$historique->equipement["code du marché"]}}</td></tr>
            <tr><td>Numéro contrat de maintenance</td><td>{{$oldEquipement["numéro contrat de maintenance"]}}</td><td>{{$historique->equipement["numéro contrat de maintenance"]}}</td></tr>
            <tr><td>Contrat de maintenance détaillé</td><td>{{$oldEquipement["Contrat de maintenance détaillé"]}}</td><td>{{$historique->equipement["Contrat de maintenance détaillé"]}}</td></tr>
            <tr><td>Occupant</td><td>{{$oldEquipement->personnel["nom"]}}</td><td>{{$historique->equipement->personnel["nom"]}}</td></tr>
            <tr><td>Adresse Physique-Mac</td><td>{{$oldEquipement["Adresse Physique"]}}</td><td>{{$historique->equipement["Adresse Physique"]}}</td></tr>
            <tr><td>Ajouté le</td><td>{{$oldEquipement->created_at}}</td><td>{{$historique->equipement->created_at}}</td></tr>
        </table>
    </div>
    <div align="center">
        @if($historique->ConfirmerParAdmin==0)
            <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
                <i class="material-icons" style="font-size:18px;">
                    done
                </i> Confirmer l'opération
            </button>
        @endif
            {!! Form::close() !!}
    </div>
    <div align="center">
        <a href={{url('/gerer_utilisateurs/Historique')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                    reply
                </i>Retour</button></a>
    </div>

@endsection