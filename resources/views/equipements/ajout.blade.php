@extends('layouts.app')

@section('content')

    <h3>AJOUTER UN EQUIPEMENT</h3>
    {!! Form::open(['action' => 'GererEquipementsController@store', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        <div class="well">

              {{Form::label('Numéro de série','Numéro de série')}}   {{Form::text('Numéro_de_série')}}<br>
              {{Form::label('code patrimoine','code patrimoine')}}   {{Form::text('code_patrimoine')}}<br>
              {{Form::label('nom','nom')}}   {{Form::text('nom')}}<br>
              {{Form::label('marque','marque')}}    {{Form::text('marque')}}<br>
              {{Form::label('type','type')}}    {{Form::text('type')}}<br>
              {{Form::label('code du marché','code du marché')}}    {{Form::text('code_du_marché')}}<br>
              {{Form::label('numéro contrat de maintenance','numéro contrat de maintenance')}}    {{Form::text('numéro_contrat_de_maintenance','Optionnel')}}<br>
              {{Form::label('Contrat de maintenance détaillé','Contrat de maintenance détaillé')}}    {{Form::textarea('Contrat_de_maintenance_détaillé','Optionnel')}}<br>
            {{Form::label('personnel',"Choisir l'occupant")}}
            <div class="col-sm-2">
            <select class="form-control input-sm" name="personnel" >
                <option selected="selected" value="">

                </option>
                @foreach($personnels as $personnel)
                    <option value="{{$personnel->id}}">{{$personnel->nom}} {{$personnel->prenom}}</option>
                @endforeach
            </select><br>
            </div>
            {{Form::label('Bon de sortie d’immobilisation','Bon de sortie d’immobilisation')}}    {{Form::text('Bon_de_sortie_d’immobilisation')}}
            {{Form::submit('AJOUT!',['class'=>'btn btn-primary'])}}
        </div>
    </div>
    {!! Form::close() !!}
@endsection