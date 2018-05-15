@extends('layouts.newapp')
@section('content')
    <div class="form-group" align="center">
        <h4>MODIFIER UN UTILISATEUR</h4><i class="material-icons" style="font-size:36px;">account_circle</i>
        <br><br>
    </div>
    {!! Form::open(['action' => ['GererUtilisateursController@finalModifier'], 'method' => 'POST']) !!}
    <div class="form-group">
        <div class="well">
        <b>{{Form::label('utilisateur',"Nom d'utilisateur : ")}}</b>
            {{Form::text('username',$user->username)}}<br>
        </div>
        <div class="well" align="center">
            <b>{{Form::label('droits','Droits')}}</b><br>
            <table>
                <tr><td>Gérer les équipements</td><td>Consulter les services</td></tr>
                <tr>
                    <td><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit1">
                            <input type="checkbox" id="droit1" name="droit1" value="1" class="mdl-checkbox__input" @if($droitbyid[0]) checked @endif/>
                            <span class="mdl-checkbox__label">AJOUT EQUIPEMENT</span>
                        </label><br>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit2">
                            <input type="checkbox" id="droit2" name="droit2" value="2" class="mdl-checkbox__input" @if($droitbyid[1]) checked @endif/>
                            <span class="mdl-checkbox__label">MODIFIER EQUIPEMENT</span>
                        </label><br>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit3">
                            <input type="checkbox" id="droit3" name="droit3" value="3" class="mdl-checkbox__input" @if($droitbyid[2]) checked @endif/>
                            <span class="mdl-checkbox__label">CONSULTER EQUIPEMENT</span>
                        </label><br>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit4">
                            <input type="checkbox" id="droit4" name="droit4" value="4" class="mdl-checkbox__input" @if($droitbyid[3]) checked @endif/>
                            <span class="mdl-checkbox__label">SUPPRIMER EQUIPEMENT</span>
                        </label><br>
                    </td>
                    <td>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit5">
                            <input type="checkbox" id="droit5" name="droit5" value="5" class="mdl-checkbox__input" @if($droitbyid[4]) checked @endif/>
                            <span class="mdl-checkbox__label">TableauxDeBords</span>
                        </label><br>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="droit6">
                            <input type="checkbox" id="droit6" name="droit6" value="6" class="mdl-checkbox__input" @if($droitbyid[5]) checked @endif/>
                            <span class="mdl-checkbox__label">Statistiques</span>
                        </label><br>
                    </td>
                </tr>
            </table>
        </div>
     <input type="hidden" name="id" value="{{$user->id}}">
        <div align="center">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
                <i class="material-icons" style="font-size:18px;">
                    done
                </i> Confirmer
            </button>
            <a href={{url('gerer_utilisateurs/Modifier')}}><input type="button" class="mdl-button mdl-js-button mdl-button--colored"><i class="material-icons" style="font-size:18px;">
                    clear
                </i>Annuler</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection