@extends('layouts.newapp')

@section('content')
    {!! Form::open(['action' => 'GererEquipementsController@ConsulterParId', 'method' => 'POST']) !!}
    <p>Chercher un équipement      </p>
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

    <div class="form-group" align="center">
        @if(isset($equipement))
                <div class="well">
                    <h4>
                        @if($equipement['nom']=="Unité Centrale")<img src="{{asset('img/Unité Centrale.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Ecran")<img src="{{asset('img/Ecran.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Imprimante")<img src="{{asset('img/Imprimante.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Scanner")<img src="{{asset('img/Scanner.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Ordinateur Portable")<img src="{{asset('img/Ordinateur Portable.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="consommables")<img src="{{asset('img/consommables.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Switch")<img src="{{asset('img/Switch.png')}}" width="70" height="70">@endif
                        @if($equipement['nom']=="Routeur")<img src="{{asset('img/Routeur.png')}}" width="70" height="70">@endif
                        <p>    </p>{{$equipement['nom']}}<a href="Consulter/{{$equipement->id}}"> Num Serie {{$equipement['Numéro de série']}} </a></h4>
                    <small>Ajouté le {{$equipement->created_at}}</small>
                </div>
        @else
            <p>Aucun Equipement trouvé</p>
        @endif
    </div>
@endsection