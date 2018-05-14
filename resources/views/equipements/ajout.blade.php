@extends('layouts.newapp')

@section('content')
<div class="form-group" align="center">
    <h4>AJOUTER UN EQUIPEMENT</h4><i class="material-icons" style="font-size:42px;">add_to_queue</i>
</div>
    {!! Form::open(['action' => 'GererEquipementsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="Numéro_de_série" />
                <label class="mdl-textfield__label" for="Numéro_de_série">Numéro de série</label>
                <span class="mdl-textfield__error">L'entrée n'est pas un nombre!</span>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="code_patrimoine"/>
                <label class="mdl-textfield__label" for="code_patrimoine">Code patrimoine</label>
                <span class="mdl-textfield__error">L'entrée n'est pas un nombre!</span>
            </div>
            <div class="col-sm-2"><select class="form-control input-sm" name="nom" >
                <option value="Unité Centrale">Unité Centrale</option>
                <option value="Ecran">Ecran</option>
                <option value="Imprimante">Imprimante</option>
                <option value="Scanner">Scanner</option>
                <option value="Ordinateur Portable">Ordinateur Portable</option>
                <option value="consommables">consommables</option>
                <option value="Switch">Switch</option>
                <option value="Routeur">Routeur</option>
             </select></div><br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="marque"/>
                <label class="mdl-textfield__label" for="marque">Marque</label>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="type"/>
                <label class="mdl-textfield__label" for="type">Type</label>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="code_du_marché"/>
                <label class="mdl-textfield__label" for="code_du_marché">Code du marché</label>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="numéro_contrat_de_maintenance"/>
                <label class="mdl-textfield__label" for="numéro_contrat_de_maintenance">Num contrat de maintenance (Optionnel)</label>
                <span class="mdl-textfield__error">L'entrée n'est pas un nombre!</span>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield textfield-demo">
                <textarea class="mdl-textfield__input" type="text" rows= "7" name="Contrat_de_maintenance_détaillé" ></textarea>
                <label class="mdl-textfield__label" for="Contrat_de_maintenance_détaillé">Contrat de maintenance détaillé <br>(Optionnel)</label>
            </div><br>


            {{Form::label('personnel',"Choisir l'occupant")}}
            <div class="col-sm-2">
            <select class="form-control input-sm" name="personnel" >
                <option selected="selected" value="">

                </option>
                @foreach($personnels as $personnel)
                    <option value="{{$personnel->id}}">{{$personnel->nom}} {{$personnel->prenom}}</option>
                @endforeach
            </select><br>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="Adresse_Physique" id="Adresse_Physique" maxlength="17"/>
                <label class="mdl-textfield__label" for="Adresse_Physique">Adresse Physique-Mac (Optionnel)</label>
            </div><br>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="Bon_de_sortie_d’immobilisation"/>
                <label class="mdl-textfield__label" for="Bon_de_sortie_d’immobilisation">Bon de sortie d’immobilisation</label>
                <span class="mdl-textfield__error">L'entrée n'est pas un nombre!</span>
            </div><br>
            <div align="center">
            {{Form::submit('AJOUT!',['class'=>'mdl-button mdl-js-button mdl-button--colored'])}}
            </div>
    </div>
    {!! Form::close() !!}

<script>
    var macAddress = document.getElementById("Adresse_Physique");

    function formatMAC(e) {
        var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
            str = e.target.value.replace(/[^a-f0-9]/ig, "");

        while (r.test(str)) {
            str = str.replace(r, '$1' + '-' + '$2');
        }

        e.target.value = str.slice(0, 17);
    };

    macAddress.addEventListener("keyup", formatMAC, false);
</script>
@endsection