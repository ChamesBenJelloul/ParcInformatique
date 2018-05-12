@extends('layouts.newapp')

@section('content')
    <h3>STATISTIQUES</h3>

    <div id="ca_graph"></div>
    @columnchart('Finances', 'ca_graph')
@endsection