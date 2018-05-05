@extends('layouts.app')

@section('content')

    <h3>TABLEAUX DE BORDS</h3>
<?php
    //$ip =   "192.168.1.20";
    //exec("ping -n 3 $ip", $output, $status);

//echo exec("ping 192.168.1.20");
//$host="192.168.1.20";


?>
    <table class="table">
        @foreach($equipements as $equipement)
            <tr><td>Equipement N {{$equipement->id}}  {{$equipement->nom}}-Numéro de série {{$equipement["Numéro de série"]}}</td>
                <td>@if(strpos($list,$equipement["Adresse Physique"]))
                        Equipement Connecté
                    @else
                        Equipement Non Connecté
                    @endif
                </td>
                <td>
                    {{$equipement["Adresse Physique"]}}
                </td>
            </tr>
        @endforeach
    </table>

@endsection