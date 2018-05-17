<html>
<head>

    <title>{{ config('app.name', 'ParcInformatique') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/custom2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">

</head>
<body>
<div align="center">
<br><br><br>
      <div class="form-group" align="center">
        <h2>401</h2><h3> Non autorisé</h3><i class="material-icons" style="font-size:36px;">error</i>
        <br><br>
      </div>
    <br><br>
    <div align="center">
        <a href={{url('/')}}><button class="mdl-button mdl-js-button mdl-button--colored" ><i class="material-icons" style="font-size:18px;">
                    reply
                </i>Retour</button></a>
    </div>


</div>
</body>
</html>