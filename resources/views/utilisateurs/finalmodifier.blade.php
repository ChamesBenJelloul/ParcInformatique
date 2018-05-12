@extends('layouts.newapp')
@section('content')
    {!! Form::open(['action' => ['GererUtilisateursController@finalModifier'], 'method' => 'POST']) !!}
    <div class="form-group" align="center">
        <div class="col-sm-2">
        <b>{{Form::label('utilisateur','Username')}}</b>
            {{Form::text('username',$user->username)}}<br>
        </div>

            <b>{{Form::label('droits','Droits')}}</b><br>
            <table>
                <tr><td>Gérer les équipements</td><td>Consulter les services</td></tr>
                <tr>
                    <td>{{Form::checkbox('droit1', '1',$droitbyid[0])}}AJOUT EQUIPEMENT<br>
                        {{Form::checkbox('droit2', '2',$droitbyid[1])}}MODIFIER EQUIPEMENT<br>
                        {{Form::checkbox('droit3', '3',$droitbyid[2])}}CONSULTER EQUIPEMENT<br>
                        {{Form::checkbox('droit4', '4',$droitbyid[3])}}SUPPRIMER EQUIPEMENT<br>
                    </td>
                    <td>
                        {{Form::checkbox('droit5', '5',$droitbyid[4])}}TableauxDeBords<br>
                        {{Form::checkbox('droit6', '6',$droitbyid[5])}}Statistiques<br>
                    </td>
                </tr>
            </table>
     <input type="hidden" name="id" value="{{$user->id}}">
    {{Form::submit('Modifier!',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
@endsection