@extends('layouts.app')

@section('content')
    <h3>EQUIPEMENT Num {{$equipement->id}}</h3>
    <div class="container"></div>
    <table class="table">
        <tr><td>Numéro de série</td><td>{{$equipement["Numéro de série"]}}</td></tr>
        <tr><td>Code patrimoine</td><td>{{$equipement["code patrimoine"]}}</td></tr>
        <tr><td>Nom</td><td>{{$equipement["nom"]}}</td></tr>
        <tr><td>Marque</td><td>{{$equipement["marque"]}}</td></tr>
        <tr><td>Type</td><td>{{$equipement["type"]}}</td></tr>
        <tr><td>Code du marché</td><td>{{$equipement["code du marché"]}}</td></tr>
        <tr><td>Numéro contrat de maintenance</td><td>{{$equipement["numéro contrat de maintenance"]}}</td></tr>
        <tr><td>Contrat de maintenance détaillé</td><td>{{$equipement["Contrat de maintenance détaillé"]}}</td></tr>
        <tr><td>Occupant</td><td>{{$personnel->nom}}</td></tr>
        <tr><td>Ajouté le</td><td>{{$equipement->created_at}}</td></tr>


    </table>
    </div>
@endsection