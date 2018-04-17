@extends('layouts.app')
@section('content')
    <h1>Ajouter un utilisateur</h1>
    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
     <div class="form-group" align="center">
         {{Form::label('personnel','Choisir un personnel')}}<br>
         <div class="col-sm-2">
         <select class="form-control input-sm" name="personnel" >
             <option selected="selected" value="0">

             </option>
             @foreach($personnels as $personnel)
                 <option value="{{$personnel->id}}">{{$personnel->nom}} {{$personnel->nom}}</option>
             @endforeach
         </select>
         </div>
         {{Form::label('droit','Assigne les droits')}}<br>
         <table>
             <tr><td>Gérer les équipements</td><td>Consulter les services</td></tr>
             <tr>
                 <td>{{Form::checkbox('droit1', '1')}}AJOUT EQUIPEMENT<br>
                     {{Form::checkbox('droit2', '2')}}MODIFIER EQUIPEMENT<br>
                     {{Form::checkbox('droit3', '3')}}CONSULTER EQUIPEMENT<br>
                     {{Form::checkbox('droit4', '4')}}SUPPRIMER EQUIPEMENT<br>
                 </td>
                 <td>
                     {{Form::checkbox('droit5', '5')}}TableauxDeBords<br>
                     {{Form::checkbox('droit6', '6')}}Statistiques<br>
                 </td>
             </tr>
          </table>
         {{Form::submit('AJOUT!',['class'=>'btn btn-primary'])}}
     </div>


    {!! Form::close() !!}

@endsection