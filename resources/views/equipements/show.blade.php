@extends('layouts.newapp')

@section('content')
    <div align="center" class="form-group">
    @if($equipement['nom']=="Unité Centrale")<img src="{{asset('img/Unité Centrale.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Ecran")<img src="{{asset('img/Ecran.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Imprimante")<img src="{{asset('img/Imprimante.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Scanner")<img src="{{asset('img/Scanner.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Ordinateur Portable")<img src="{{asset('img/Ordinateur Portable.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="consommables")<img src="{{asset('img/consommables.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Switch")<img src="{{asset('img/Switch.png')}}" width="70" height="70">@endif
    @if($equipement['nom']=="Routeur")<img src="{{asset('img/Routeur.png')}}" width="70" height="70">@endif
    </div>
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
        <tr><td>Adresse Physique-Mac</td><td>{{$equipement["Adresse Physique"]}}</td></tr>
        <tr><td>Ajouté le</td><td>{{$equipement->created_at}}</td></tr>
    </table>
    <a href="{{$equipement->id}}/Modifier">
    <button class="mdl-button mdl-js-button mdl-button--colored">
        <i class="material-icons">
            build
        </i> Modifier
    </button></a>
    {!!Form::open(['action' => ['GererEquipementsController@destroy',$equipement->id], 'method' => 'POST' , 'class' => 'pull-right']) !!}
    {{Form::hidden('_method','DELETE')}}
    <div style="float: right;">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
            <i class="material-icons">
                delete_sweep
            </i>
            Supprimer
        </button>
    </div>
    {!! Form::close()!!}



@endsection