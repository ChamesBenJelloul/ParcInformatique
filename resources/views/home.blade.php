@extends('layouts.newapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard    {{ Auth::user()->username }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h2>WELCOME</h2>
                        <a href={{url('gerer_equipements')}}><button type="button" class="btn btn-primary">Gérer les équipements</button></a>
                        <a href={{url('consulter_services')}}><button type="button" class="btn btn-primary">Consulter les services</button></a>
                        <a href={{url('gerer_utilisateurs')}}><button type="button" class="btn btn-primary">Gérer les utilisateurs</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
