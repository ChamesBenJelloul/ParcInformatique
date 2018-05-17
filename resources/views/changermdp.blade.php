@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>Changer Mot De Passe</h4><i class="material-icons" style="font-size:36px;">security</i>
        <br><br>
    </div>
    {!! Form::open(['action' => 'HomeController@reset', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        <div class="well">
            <br><br>
            {{Form::label('password','Nouveau Mot De Passe')}}   {{Form::password('password', ['class' => 'awesome'])}}<br><br>
            {{Form::label('password','Confirmer Nouveau Mot De Passe')}}   {{Form::password('password2', ['class' => 'awesome'])}}<br><br>
            <div align="center">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
                    <i class="material-icons" style="font-size:18px;">
                        done
                    </i> Confirmer
                </button>
                <a href={{url('/')}}><input type="button" class="mdl-button mdl-js-button mdl-button--colored"><i class="material-icons" style="font-size:18px;">
                        clear
                    </i>Annuler</a>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
@endsection