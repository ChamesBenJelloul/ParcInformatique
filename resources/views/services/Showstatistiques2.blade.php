@extends('layouts.newapp')

@section('content')
    <h3>STATISTIQUES</h3>

    <div id="temps_div"></div>
    @linechart('Temps', 'temps_div')
@endsection