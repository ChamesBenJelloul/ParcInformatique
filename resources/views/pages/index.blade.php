<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','ParcInformatique')}}</title>
</head>
<body>
<div class="container">
    <h2>WELCOME</h2>
    <a href={{url('gerer_equipements')}}><button type="button" class="btn btn-primary">Gérer les équipements</button></a>
    <a href={{url('consulter_services')}}><button type="button" class="btn btn-primary">Consulter les services</button></a>
    <a href={{url('gerer_utilisateurs')}}><button type="button" class="btn btn-primary">Gérer les utilisateurs</button></a>
</div>
</body>
</html>