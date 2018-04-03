<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/gerer_equipements', 'GererEquipementsController@index');
Route::get('/gerer_equipements/Ajout', 'GererEquipementsController@Ajout');
Route::get('/gerer_equipements/Modifier', 'GererEquipementsController@Modifier');
Route::get('/gerer_equipements/Consulter', 'GererEquipementsController@Consulter');
Route::get('/gerer_equipements/Supprimer', 'GererEquipementsController@Supprimer');
Route::get('/consulter_services', 'ConsulterServicesController@index');
Route::get('/consulter_services/TableauxDeBords', 'ConsulterServicesController@TableauxDeBords');
Route::get('/consulter_services/Statistiques', 'ConsulterServicesController@Statistiques');
Route::get('/gerer_utilisateurs', 'GererUtilisateursController@index');
Route::get('/gerer_utilisateurs/Ajout', 'GererUtilisateursController@Ajout');
Route::get('/gerer_utilisateurs/Modifier', 'GererUtilisateursController@Modifier');
Route::get('/gerer_utilisateurs/Supprimer', 'GererUtilisateursController@Supprimer');
Route::get('/gerer_utilisateurs/Historique', 'GererUtilisateursController@Historique');