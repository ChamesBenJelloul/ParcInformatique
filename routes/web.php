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

Route::get('/', function (){return redirect('/home');});
Route::get('/gerer_equipements', 'GererEquipementsController@index')->middleware('auth');
Route::get('/gerer_equipements/Ajout', 'GererEquipementsController@Ajout')->middleware('role:AJOUT EQUIPEMENT')->middleware('auth');
Route::post('store','GererEquipementsController@store')->middleware('role:AJOUT EQUIPEMENT')->middleware('auth');;
Route::get('/gerer_equipements/Consulter', 'GererEquipementsController@Consulter')->middleware('role:CONSULTER EQUIPEMENT')->middleware('auth');
Route::post('/gerer_equipements/Consulter', 'GererEquipementsController@ConsulterParId')->middleware('role:CONSULTER EQUIPEMENT')->middleware('auth');
Route::get('/gerer_equipements/Consulter/{equipement}','GererEquipementsController@show')->middleware('role:CONSULTER EQUIPEMENT')->middleware('auth');
Route::get('/gerer_equipements/Consulter/{equipement}/Modifier', 'GererEquipementsController@Modifier')->middleware('role:MODIFIER EQUIPEMENT')->middleware('auth');
Route::put('/gerer_equipements/Consulter/{equipement}','GererEquipementsController@update')->middleware('role:MODIFIER EQUIPEMENT')->middleware('auth')->name('update');
Route::delete('/gerer_equipements/Consulter/{equipement}', 'GererEquipementsController@destroy')->middleware('role:SUPPRIMER EQUIPEMENT')->middleware('auth')->name('delete');
Route::get('/consulter_services', 'ConsulterServicesController@index')->middleware('auth');
Route::get('/consulter_services/TableauxDeBords', 'ConsulterServicesController@TableauxDeBords')->middleware('role:TABLEAUX DE BORDS')->middleware('auth');
Route::get('/consulter_services/Statistiques', 'ConsulterServicesController@Statistiques')->middleware('role:STATISTIQUES')->middleware('auth');
Route::post('/consulter_services/Statistiques/show', 'ConsulterServicesController@Showstatistiques')->middleware('role:STATISTIQUES')->middleware('auth');

Route::get('/gerer_utilisateurs', 'GererUtilisateursController@index')->middleware('role:ADMIN')->middleware('auth');
Route::get('/gerer_utilisateurs/Modifier', 'GererUtilisateursController@Modifier')->middleware('role:ADMIN')->middleware('auth');
Route::get('/gerer_utilisateurs/Supprimer', 'GererUtilisateursController@Supprimer')->middleware('role:ADMIN')->middleware('auth');
Route::get('/gerer_utilisateurs/Historique', 'GererUtilisateursController@Historique')->middleware('role:ADMIN')->middleware('auth');
Route::get('/gerer_utilisateurs/Historique/{historique}','GererUtilisateursController@showHistorique')->middleware('role:ADMIN')->middleware('auth');
Route::post('/gerer_utilisateurs/Historique/{historique}','GererUtilisateursController@confirmer')->middleware('role:ADMIN')->middleware('auth');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/gerer_utilisateurs/Ajout', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('role:ADMIN')->middleware('auth');
Route::post('/gerer_utilisateurs/Ajout/Final', 'Auth\RegisterController@register')->name('register')->middleware('role:ADMIN')->middleware('auth');
Route::post('finalregister', 'Auth\RegisterController@finalregister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('password_reset','HomeController@changermdp')->name('changermdp')->middleware('auth');
Route::post('password_reset','HomeController@reset')->middleware('auth');

Route::post('/gerer_utilisateurs/Modifier/Final','GererUtilisateursController@modifierForm');
Route::post('finalModifier','GererUtilisateursController@finalModifier');
Route::post('finalSupprimer','GererUtilisateursController@finalSupprimer');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test',function (){
    return view('layouts.newapp');
});