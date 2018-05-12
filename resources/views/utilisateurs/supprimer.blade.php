@extends('layouts.newapp')

@section('content')

    <h3>SUPPRIMER UTILISATEUR</h3>
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
            {{Form::submit('Supprimer!',['class'=>'btn btn-primary'])}}
        </div>
    </div>
    {!! Form::close() !!}
@endsection