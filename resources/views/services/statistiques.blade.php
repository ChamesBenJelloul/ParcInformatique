@extends('layouts.app')

@section('content')

    <h3>STATISTIQUES</h3>
    {!! Form::open(['action' => 'ConsulterServicesController@Showstatistiques', 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        {{Form::label('élément','Elément')}}
        <div class="col-sm-2">
        <select class="form-control input-sm" name="element" id="element">
            <option selected="selected" value="aa">

            </option>
            <option value="equipement">les équipements les plus utilisés</option>
            <option value="marque">les marques d'équipement les plus utilisées</option>
            <option value="type">les types d'équipement les plus utilisés</option>
            <option value="utilisateur">les utilisateurs les plus actifs</option>
            <option value="nbr_equi">nombre d'équipements</option>
            <option value="nbr_utili">nombre d'utilisateurs</option>
            <option value="nbr_admin">nombre d'administrateurs</option>
        </select>
        </div>
        {{Form::label('critère','Critère')}}
        <div class="col-sm-2">
        <select class="form-control input-sm" name="critere" id="critere" onchange="critereValue()">
            <option selected="selected" value="">

            </option>
            <option value="temps">temps</option>
            <option value="Occupant">Occupant</option>
        </select>
        </div>
        <br>
        <div class="col-sm-2">
        <select class="form-control input-sm" id="critere2" name="critere2"></select>
        </div>
    </div>

    <script>
           function critereValue() {


            var e = document.getElementById("critere");
            var strUser = e.options[e.selectedIndex].value;

            var cr1 = ["Avant 6 mois","Avant 12 mois","Avant 24 mois"];
            var cr2 = [@foreach($personnels as $personnel)
                        "{{$personnel->nom}} {{$personnel->prenom}}",@endforeach];

        var sel = document.getElementById('critere2');
         document.getElementById('critere2').options.length=0;
        var fragment = document.createDocumentFragment();
        if(!strUser.localeCompare("temps")){
            var criteres=cr1;}
        if(!strUser.localeCompare("Occupant")){
            var criteres=cr2;
        }
        criteres.forEach(function(critere, index) {
            var opt = document.createElement('option');
            opt.innerHTML = critere;
            opt.value = critere;
            fragment.appendChild(opt);
            criteres=null;
        });

        sel.appendChild(fragment);
           }
    </script>
    <div align="center">
    {{Form::submit('Confirmer!',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
@endsection