@extends('layouts.app')

@section('content')

    <h3>CONSULTER EQUIPEMENT</h3>
    <div class="form-group" align="center">
    @if(count($equipements)>0)
      @foreach($equipements as $equipement)
        <div class="well">
                 <h2>{{$equipement['nom']}}<a href="Consulter/{{$equipement->id}}"> Num Serie {{$equipement['Numéro de série']}} </a></h2>
                 <small>Ajouté le {{$equipement->created_at}}</small>
        </div>
      @endforeach
    @else
       <p>Aucun Equipement trouvé</p>
    @endif
    </div>
@endsection