@extends('layouts.app')

@section('content')
    <h2>Consulter les services</h2>
    <a href={{url('/consulter_services/TableauxDeBords')}}><button type="button" class="btn btn-primary">TableauxDeBords</button></a>
    <a href={{url('/consulter_services/Statistiques')}}><button type="button" class="btn btn-primary">Statistiques</button></a>
@endsection