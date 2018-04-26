@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => ['GererUtilisateursController@confirmer',$historique->id], 'method' => 'POST']) !!}
    <div class="container">
    <table class="table">
        <tr><td>Date</td><td>{{$historique->created_at}}</td></tr>
        <tr><td>Action</td><td>{{$historique->action}}</td></tr>
        <tr><td>Utilisateur></td><td>{{$historique->user["username"]}}</td></tr>
        <tr><td>Bon de sortie d'immobilisation</td><td>{{$historique->bon_num}}</td></tr>
        <tr><td>Equipement</td></tr>
        <tr><td>Numéro de série</td><td>{{$historique->equipement["Numéro de série"]}}</td></tr>
        <tr><td>Code patrimoine</td><td>{{$historique->equipement["code patrimoine"]}}</td></tr>
        <tr><td>Nom</td><td>{{$historique->equipement["nom"]}}</td></tr>
        <tr><td>Marque</td><td>{{$historique->equipement["marque"]}}</td></tr>
        <tr><td>Type</td><td>{{$historique->equipement["type"]}}</td></tr>
        <tr><td>Code du marché</td><td>{{$historique->equipement["code du marché"]}}</td></tr>
        <tr><td>Numéro contrat de maintenance</td><td>{{$historique->equipement["numéro contrat de maintenance"]}}</td></tr>
        <tr><td>Contrat de maintenance détaillé</td><td>{{$historique->equipement["Contrat de maintenance détaillé"]}}</td></tr>
        <tr><td>Occupant</td><td>{{$historique->equipement->personnel["nom"]}}</td></tr>
        <tr><td>Ajouté le</td><td>{{$historique->equipement->created_at}}</td></tr>
    </table>
    </div>
    <div align="center">
        {{Form::submit("Confirmer l'opération!",['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
@endsection