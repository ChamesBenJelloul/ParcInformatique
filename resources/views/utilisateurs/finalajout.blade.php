@extends('layouts.newapp')
@section('content')
    <div class="form-group" align="center">
        <h4>Confirmer l'ajout</h4><i class="material-icons" style="font-size:36px;">verified_user</i>
        <br><br>
    </div>
    {!! Form::open(['action' => 'Auth\RegisterController@finalregister', 'method' => 'POST']) !!}
    <div class="form-group" >
        <div class="well">
           <b> {{Form::label('username',"Nom d'utilisateur : ")}} </b>
            {{$finalrequest['username']}}<br>
        </div>

        <div class="well">
            <b>{{Form::label('password','Mot de passe : ')}} </b>
            {{$finalrequest['password']}}<br>
        </div>
        <div class="well">
            <b>{{Form::label('droit','Droits attribués : ')}} </b><br>

                   @if($finalrequest[1]) -AJOUT EQUIPEMENT<br> @endif
                   @if($finalrequest[2]) -MODIFIER EQUIPEMENT<br> @endif
                   @if($finalrequest[3]) -CONSULTER EQUIPEMENT<br> @endif
                   @if($finalrequest[4]) -SUPPRIMER EQUIPEMENT<br> @endif
                   @if($finalrequest[5]) -TableauxDeBords<br> @endif
                   @if($finalrequest[6]) -Statistiques<br> @endif
                   @if(($finalrequest[1]==$finalrequest[2])&&($finalrequest[2]==$finalrequest[3])&&($finalrequest[3]==$finalrequest[4])&&($finalrequest[4]==$finalrequest[5])&&($finalrequest[5]==$finalrequest[6])&&($finalrequest[6]==0))
                   0 droits attribués
                       @endif
        </div>
        <input type="hidden" name="username" value="{{$finalrequest['username']}}">
        <input type="hidden" name="password" value="{{$finalrequest['password']}}">
        <input type="hidden" name="id_personnel" value="{{$finalrequest['id_personnel']}}">
        <input type="hidden" name="droit1" value="{{$finalrequest['1']}}">
        <input type="hidden" name="droit2" value="{{$finalrequest['2']}}">
        <input type="hidden" name="droit3" value="{{$finalrequest['3']}}">
        <input type="hidden" name="droit4" value="{{$finalrequest['4']}}">
        <input type="hidden" name="droit5" value="{{$finalrequest['5']}}">
        <input type="hidden" name="droit6" value="{{$finalrequest['6']}}">
        <div align="center">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
                <i class="material-icons" style="font-size:18px;">
                    done
                </i> Confirmer
            </button>
        <a href={{url('gerer_utilisateurs/Ajout')}}><input type="button" class="mdl-button mdl-js-button mdl-button--colored"><i class="material-icons" style="font-size:18px;">
                clear
            </i>Annuler</a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection