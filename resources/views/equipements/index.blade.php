@extends('layouts.app')

@section('content')
    <h2>Gerer les equipements</h2>
    <a href={{url('/gerer_equipements/Ajout')}}><button type="button" class="btn btn-primary">Ajouter</button></a>
    <a href={{url('/gerer_equipements/Consulter')}}><button type="button" class="btn btn-primary">Consulter</button></a>

@endsection