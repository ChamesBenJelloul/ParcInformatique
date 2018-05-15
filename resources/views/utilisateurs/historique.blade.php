@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>HISTORIQUE</h4><i class="material-icons" style="font-size:36px;">history</i>
        <br><br>
    </div>
    @if(count($historiques)<1)
        <p>aucune action n'a été faite </p>
    @else
    <div class="container"></div>
    <table class="table">
        <tr><td>Date</td><td>Action</td><td>Utilisateur</td><td>Equipement [Numéro de série]</td><td>  </td></tr>
        @foreach($historiques as $historique)
        <tr><td>{{$historique->created_at}}</td><td>
               @if($historique->action=="Ajout") <i class="material-icons" >add_circle</i>  {{$historique->action}} @endif
                @if($historique->action=="Modification") <i class="material-icons" >build</i>  {{$historique->action}} @endif
                @if($historique->action=="Suppression") <i class="material-icons" >delete_forever</i>  {{$historique->action}} @endif

            </td><td>{{$historique->user["username"]}}</td><td>{{$historique->equipement["nom"]}} : [{{$historique->equipement["Numéro de série"]}}]</td><td><a href="Historique/{{$historique->id}}"><button class="btn btn-default" >Plus d'informations</button></a></td></tr>
        @endforeach
    </table>
    </div>
    @endif
@endsection