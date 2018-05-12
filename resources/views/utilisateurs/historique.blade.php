@extends('layouts.newapp')

@section('content')

    <h3>HISTORIQUE UTILISATEUR</h3>
    @if(count($historiques)<1)
        <p>aucune action n'a été faite </p>
    @else
    <div class="container"></div>
    <table class="table">
        <tr><td>Date</td><td>Action</td><td>Utilisateur</td><td>Equipement [Numéro de série]</td><td>  </td></tr>
        @foreach($historiques as $historique)
        <tr><td>{{$historique->created_at}}</td><td>{{$historique->action}}</td><td>{{$historique->user["username"]}}</td><td>{{$historique->equipement["Numéro de série"]}}</td><td><a href="Historique/{{$historique->id}}"><button class="btn btn-default" >Plus d'informations</button></a></td></tr>
        @endforeach
    </table>
    </div>
    @endif
@endsection