@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>TABLEAU DE BORD</h4><i class="material-icons" style="font-size:42px;">dashboard</i>
    </div>
    <div>
        <div style="display: inline-block;">
            <img src={{asset('img/actif.png')}} height=50px width="50px"> <small>Actif</small><br><br>
            <img src={{asset('img/Inactif.png')}} height=50px width="50px"> <small>Inactif</small>
        </div>
        <div style="display: inline-block;float: right;" >
            {!! Form::open(['action' => 'ConsulterServicesController@ConsulterParId', 'method' => 'POST']) !!}
            <p>Chercher Par № Série      </p>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="Numéro_de_série"/>
                <label class="mdl-textfield__label" for="Numéro_de_série">Numéro de série</label>
                <span class="mdl-textfield__error">L'entrée n'est pas un nombre!</span>
            </div>
            <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                <i class="material-icons">
                    search
                </i>
            </button>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="container">
        <br><br><br>
        <div class="form-group" align="center">
                <div  style="width: 270px;display: inline-block;">
                    @if($equipement['nom']=="Unité Centrale")<img src="{{asset('img/Unité Centrale.png')}}" width="90" height="120">@endif
                    @if($equipement['nom']=="Ecran")<img src="{{asset('img/Ecran.png')}}" width="120" height="120">@endif
                    @if($equipement['nom']=="Imprimante")<img src="{{asset('img/Imprimante.png')}}" width="120" height="120">@endif
                    @if($equipement['nom']=="Scanner")<img src="{{asset('img/Scanner.png')}}" width="90" height="90">@endif
                    @if($equipement['nom']=="Ordinateur Portable")<img src="{{asset('img/Ordinateur Portable.png')}}" width="120" height="120">@endif
                    @if($equipement['nom']=="consommables")<img src="{{asset('img/consommables.png')}}" width="120" height="120">@endif
                    @if($equipement['nom']=="Switch")<img src="{{asset('img/Switch.png')}}" width="100" height="100">@endif
                    @if($equipement['nom']=="Routeur")<img src="{{asset('img/Routeur.png')}}" width="120" height="120">@endif
                    @if(strpos($list,strtolower ($equipement["Adresse Physique"])))
                        <img src={{asset('img/actif.png')}} height=50px width="50px">
                    @else
                        <img src={{asset('img/Inactif.png')}} height=50px width="50px">
                    @endif
                    <br> <small>№ Série: {{$equipement["Numéro de série"]}}</small>
                    @if(strpos($list,strtolower ($equipement["Adresse Physique"]))) <br> <small>Adresse IP : {{substr($list,strpos($list,$equipement["Adresse Physique"])-22,12)}}</small> @endif
                    <br> <small>Adresse MAC : {{$equipement["Adresse Physique"]}}</small>
                    <br> <small>Occupant : {{$equipement->personnel['nom']." ".$equipement->personnel['nom']}}</small>
                    <br><br>
                </div>
        </div>
    </div>

@endsection