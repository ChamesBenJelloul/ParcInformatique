@extends('layouts.newapp')

@section('content')
    <div class="form-group" align="center">
        <h4>STATISTIQUES</h4><i class="material-icons" style="font-size:36px;">assessment</i>
        <br><br>
    </div>

    <div id="temps_div"></div>
    @linechart('Temps', 'temps_div')

    <br><br>
    <div align="right">
        <a href={{url('/consulter_services/Statistiques')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                    reply
                </i>Retour</button></a>
    </div>
@endsection