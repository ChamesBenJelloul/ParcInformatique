@extends('layouts.newapp')
@section('content')
    <div class="form-group" align="center">
        <h4>AJOUTER UN UTILISATEUR</h4><i class="material-icons" style="font-size:36px;">person_add</i>
        <br><br>
    </div>
    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
     <div class="form-group" align="center">
         {{Form::label('personnel','Choisir un personnel')}}<br>
         <div class="col-sm-2">
         <select class="form-control input-sm" name="personnel" >
             <option selected="selected" value="">

             </option>
             @foreach($personnels as $personnel)
                 <option value="{{$personnel->id}}">{{$personnel->nom}} {{$personnel->nom}}</option>
             @endforeach
         </select>
         </div>
         <br>
         {{Form::label('droit','Assigne les droits')}}<br>
         <table>
             <tr><td>Gérer les équipements</td><td>Consulter les services</td></tr>
             <tr>
                 <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit1">
                         <input type="checkbox" id="droit1" name="droit1" value="1" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">AJOUT EQUIPEMENT</span>
                     </label><br>
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit2">
                         <input type="checkbox" id="droit2" name="droit2" value="2" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">MODIFIER EQUIPEMENT</span>
                     </label><br>
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit3">
                         <input type="checkbox" id="droit3" name="droit3" value="3" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">CONSULTER EQUIPEMENT</span>
                     </label><br>
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit4">
                         <input type="checkbox" id="droit4" name="droit4" value="4" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">SUPPRIMER EQUIPEMENT</span>
                     </label><br>
                 </td>
                 <td>
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit5">
                         <input type="checkbox" id="droit5" name="droit5" value="5" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">TableauxDeBords</span>
                     </label><br>
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit6">
                         <input type="checkbox" id="droit6" name="droit6" value="6" class="mdl-checkbox__input" />
                         <span class="mdl-checkbox__label">Statistiques</span>
                     </label><br>
                 </td>
             </tr>
          </table>
         <br>
         <div align="center">
             {{Form::submit('AJOUT!',['class'=>'mdl-button mdl-js-button mdl-button--colored'])}}
         </div>
     </div>


    {!! Form::close() !!}

@endsection