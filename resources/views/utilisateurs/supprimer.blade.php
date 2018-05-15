@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>SUPPRIMER UN UTILISATEUR</h4><i class="material-icons" style="font-size:36px;">person_outline</i>
        <br><br>
    </div>
    {!! Form::open(['action' => 'GererUtilisateursController@finalSupprimer', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        {{Form::label('utilisateur','Choisir un utilisateur')}}<br>
        <div class="col-sm-2">
            <select class="form-control input-sm" name="utilisateur" >
                <option selected="selected" value="">

                </option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                @endforeach
            </select>
            <br>
            {{Form::submit('Supprimer!',['class'=>'mdl-button mdl-js-button mdl-button--colored'])}}
        </div>
    </div>
    {!! Form::close() !!}
@endsection