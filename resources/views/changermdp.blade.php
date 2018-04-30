@extends('layouts.app')

@section('content')
    <h3>Changer Mot De Passe</h3>
    {!! Form::open(['action' => 'HomeController@reset', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        <div class="well">
            <br><br>
            {{Form::label('password','Nouveau Mot De Passe')}}   {{Form::password('password', ['class' => 'awesome'])}}<br><br>
            {{Form::label('password','Confirmer Nouveau Mot De Passe')}}   {{Form::password('password2', ['class' => 'awesome'])}}<br><br>
            <div align="center">
            {{Form::submit('AJOUT!',['class'=>'btn btn-primary'])}}
            </div>

        </div>
    </div>
    {!! Form::close() !!}
@endsection