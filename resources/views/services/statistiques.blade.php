@extends('layouts.app')

@section('content')

    <h3>STATISTIQUES</h3>
    {!! Form::open(['action' => 'ConsulterServicesController@Showstatistiques', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        {{Form::label('élément','Elément')}}
        <div class="col-sm-2">
        <select class="form-control input-sm" name="element" >
            <option selected="selected" value="">

            </option>
            <option value="marque">les marques d'équipement les plus utilisées</option>
            <option value="type">les types d'équipement les plus utilisées</option>
            <option value="utilisateur">les utilisateurs les plus actifs</option>
        </select>
        </div>
        {{Form::label('critère','Critère')}}
        <div class="col-sm-2">
        <select class="form-control input-sm" name="critere" >
            <option selected="selected" value="">

            </option>
        </select>
        </div>
    </div>
    {{Form::submit('Confirmer!',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection