@extends('layouts.newapp')

@section('content')

    <div align="center" class="form-group">
        @if($equipement['nom']=="Unité Centrale")<img src="{{asset('img/Unité Centrale.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Ecran")<img src="{{asset('img/Ecran.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Imprimante")<img src="{{asset('img/Imprimante.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Scanner")<img src="{{asset('img/Scanner.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Ordinateur Portable")<img src="{{asset('img/Ordinateur Portable.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="consommables")<img src="{{asset('img/consommables.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Switch")<img src="{{asset('img/Switch.png')}}" width="70" height="70">@endif
        @if($equipement['nom']=="Routeur")<img src="{{asset('img/Routeur.png')}}" width="70" height="70">@endif
    </div>

    {!!Form::open(['action' => ['GererEquipementsController@update' ,$equipement->id] , 'method' => 'POST']) !!}

    <table class="table">
        <tr><td>Numéro de série</td><td>{{$equipement["Numéro de série"]}}</td></tr>
        <tr><td>Code patrimoine</td><td>{{Form::text('code_patrimoine',$equipement["code patrimoine"])}}</td></tr>
        <tr><td>Nom</td><td><select class="form-control input-sm" name="nom" >
                    <option value="Unité Centrale" @if ($equipement["nom"]=="Unité Centrale") selected="selected" @endif>Unité Centrale</option>
                    <option value="Ecran" @if ($equipement["nom"]=="Ecran") selected="selected" @endif>Ecran</option>
                    <option value="Imprimante" @if ($equipement["nom"]=="Imprimante") selected="selected" @endif>Imprimante</option>
                    <option value="Scanner" @if ($equipement["nom"]=="Scanner") selected="selected" @endif>Scanner</option>
                    <option value="Ordinateur Portable" @if ($equipement["nom"]=="Ordinateur Portable") selected="selected" @endif>Ordinateur Portable</option>
                    <option value="consommables" @if ($equipement["nom"]=="consommables") selected="selected" @endif>consommables</option>
                    <option value="Switch" @if ($equipement["nom"]=="Switch") selected="selected" @endif>Switch</option>
                    <option value="Routeur" @if ($equipement["nom"]=="Routeur") selected="selected" @endif>Routeur</option>
                </select></td></tr>
        <tr><td>Marque</td><td>{{Form::text('marque',$equipement["marque"])}}</td></tr>
        <tr><td>Type</td><td>{{Form::text('type',$equipement["type"])}}</td></tr>
        <tr><td>Code du marché</td><td>{{Form::text('code_du_marché',$equipement["code du marché"])}}</td></tr>
        <tr><td>Numéro contrat de maintenance</td><td>{{Form::text('numéro_contrat_de_maintenance',$equipement["numéro contrat de maintenance"])}}</td></tr>
        <tr><td>Contrat de maintenance détaillé</td><td>{{Form::textarea('Contrat_de_maintenance détaillé',$equipement["Contrat de maintenance détaillé"])}}</td></tr>
        <tr><td>Occupant</td><td>            <select class="form-control input-sm" name="personnel" >
                    <option selected="selected" value="{{$equipement->personnel->id}}">
                     {{$equipement->personnel->nom}}  {{$equipement->personnel->prenom}}
                    </option>
                    @foreach($personnels as $personnel)
                        @if($personnel!=$equipement->personnel)
                        <option value="{{$personnel->id}}">{{$personnel->nom}} {{$personnel->prenom}}</option>
                        @endif
                    @endforeach
                </select></td></tr>
        <tr><td>Adresse Physique-Mac</td><td><input type="text" name="Adresse_Physique" id="Adresse_Physique" maxlength="17" value="{{$equipement["Adresse Physique"]}}"/></td></tr>
        <tr><td>Bon de transfert d’immobilisation (en cas de modification du l'occupant)</td><td>{{Form::text('num_bon')}}</td></tr>
    </table>

    <div class="form-group" align="center">
        <input type="hidden" name="Numéro_de_série" value="{{$equipement["Numéro de série"]}}">
        <input type="hidden" name="personnel_old" value="{{$equipement->personnel->id}}">
        {{Form::hidden('_method','PUT')}}
        <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
            <i class="material-icons" style="font-size:18px;">
                done
            </i> Confirmer
        </button>{!! Form::close() !!}
        {!!Form::open(['action' => ['GererEquipementsController@show' ,$equipement->id] , 'method' => 'GET' , 'style' => 'display:inline-block']) !!}
        <button type="submit" class="mdl-button mdl-js-button mdl-button--colored">
            <i class="material-icons" style="font-size:18px;">
                clear
            </i>Annuler
            </button>
        {!! Form::close() !!}
    </div>
    <script>
        var macAddress = document.getElementById("Adresse_Physique");

        function formatMAC(e) {
            var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
                str = e.target.value.replace(/[^a-f0-9]/ig, "");

            while (r.test(str)) {
                str = str.replace(r, '$1' + '-' + '$2');
            }

            e.target.value = str.slice(0, 17);
        };

        macAddress.addEventListener("keyup", formatMAC, false);
    </script>
@endsection
