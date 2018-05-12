@extends('layouts.newapp')

@section('content')

    <h3>AJOUTER UN EQUIPEMENT</h3>
    {!! Form::open(['action' => 'GererEquipementsController@store', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        <div class="well">

              {{Form::label('Numéro de série','Numéro de série')}}   {{Form::text('Numéro_de_série')}}<br>
              {{Form::label('code patrimoine','code patrimoine')}}   {{Form::text('code_patrimoine')}}<br>
                <div class="col-sm-2">{{Form::label('nom','nom')}}   <select class="form-control input-sm" name="nom" >
                <option value="Unité Centrale">Unité Centrale</option>
                <option value="Ecran">Ecran</option>
                <option value="Imprimante">Imprimante</option>
                <option value="Scanner">Scanner</option>
                <option value="Ordinateur Portable">Ordinateur Portable</option>
                <option value="consommables">consommables</option>
                <option value="Switch">Switch</option>
                <option value="Routeur">Routeur</option>
                </select></div><br>
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