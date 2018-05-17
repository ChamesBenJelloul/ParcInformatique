@extends('layouts.newapp')

@section('content')
<div class="container">
    <div class="form-group" align="center">
        @if(Auth::user()->hasRole('AJOUT EQUIPEMENT')) <div class="card" style="width: 270px;display: inline-block;">
                <div class="card-body">
                    <img src={{asset("img/1.png")}} width="250px"  >
                </div>

                <div class="card-header">
                    <a href={{url('/gerer_equipements/Ajout')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                                reply
                            </i>AJOUTER DES éQUIPEMENTS</button></a>
                </div>
            </div>
    @endif
            @if(Auth::user()->hasRole('CONSULTER EQUIPEMENT'))
            <div class="card" style="width: 280px;display: inline-block;">
                <div class="card-body">
                    <img src={{asset("img/2.png")}} width="250px"  >
                </div>

                <div class="card-header">
                    <a href={{url('/gerer_equipements/Consulter')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                                reply
                            </i>CONSULTER DES éQUIPEMENTS</button></a>
                </div>
            </div>
            @endif
                @if(Auth::user()->hasRole('TABLEAUX DE BORDS'))
            <div class="card" style="width: 270px;display: inline-block;">
                <div class="card-body">
                    <img src={{asset("img/3.png")}} width="250px"  >
                </div>

                <div class="card-header">
                    <a href={{url('/consulter_services/TableauxDeBords')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                                reply
                            </i>TABLEAU DE BORD</button></a>
                </div>
            </div>
        <br><br><br>
            @endif
            @if(Auth::user()->hasRole('STATISTIQUES'))
            <div class="card" style="width: 270px;display: inline-block;">
                <div class="card-body">
                    <img src={{asset("img/4.png")}} width="250px"  >
                </div>

                <div class="card-header">
                    <a href={{url('/consulter_services/Statistiques')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                                reply
                            </i>STATISTIQUES</button></a>
                </div>
            </div>
            @endif
            @if(Auth::user()->isAdmin())
            <div class="card" style="width: 270px;display: inline-block;">
                <div class="card-body">
                    <img src={{asset("img/5.png")}} width="250px"  >
                </div>

                <div class="card-header">
                    <a href={{url('/gerer_utilisateurs/Historique')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                                reply
                            </i>Gérer les utilisateurs</button></a>
                </div>
            </div>
                @endif
    </div>
</div>

@endsection
