@extends('layouts.app')

@section('content')
    <h2>Gerer les utilisateurs</h2>
    <a href={{url('/gerer_utilisateurs/Ajout')}}><button type="button" class="btn btn-primary">Ajout</button></a>
    <a href={{url('/gerer_utilisateurs/Modifier')}}><button type="button" class="btn btn-primary">Modifier</button></a>
    <a href={{url('/gerer_utilisateurs/Historique')}}><button type="button" class="btn btn-primary">Historique</button></a>
    <a href={{url('/gerer_utilisateurs/Supprimer')}}><button type="button" class="btn btn-primary">Supprimer</button></a>
@endsection