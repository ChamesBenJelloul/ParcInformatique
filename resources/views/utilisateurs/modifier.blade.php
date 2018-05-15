@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>MODIFIER UN UTILISATEUR</h4><i class="material-icons" style="font-size:36px;">account_circle</i>
        <br><br>
    </div>
    {!! Form::open(['action' => 'GererUtilisateursController@modifierForm', 'method' => 'POST']) !!}
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
            <br><br>
            <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
                <i class="material-icons">
                    build
                </i> Choisir
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection