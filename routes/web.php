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
Route::get('/gerer_equipements', 'GererEquipementsController@index');
Route::get('/gerer_equipements/Ajout', 'GererEquipementsController@Ajout')->middleware('role:AJOUT EQUIPEMENT');
Route::get('/gerer_equipements/Modifier', 'GererEquipementsController@Modifier')->middleware('role:MODIFIER EQUIPEMENT');
Route::get('/gerer_equipements/Consulter', 'GererEquipementsController@Consulter')->middleware('role:CONSULTER EQUIPEMENT');
Route::get('/gerer_equipements/Supprimer', 'GererEquipementsController@Supprimer')->middleware('role:SUPPRIMER EQUIPEMENT');
Route::get('/consulter_services', 'ConsulterServicesController@index');
Route::get('/consulter_services/TableauxDeBords', 'ConsulterServicesController@TableauxDeBords')->middleware('role:TABLEAUX DE BORDS');
Route::get('/consulter_services/Statistiques', 'ConsulterServicesController@Statistiques')->middleware('role:STATISTIQUES');
Route::get('/gerer_utilisateurs', 'GererUtilisateursController@index')->middleware('role:ADMIN');

Route::get('/gerer_utilisateurs/Modifier', 'GererUtilisateursController@Modifier')->middleware('role:ADMIN');
Route::get('/gerer_utilisateurs/Supprimer', 'GererUtilisateursController@Supprimer')->middleware('role:ADMIN');
Route::get('/gerer_utilisateurs/Historique', 'GererUtilisateursController@Historique')->middleware('role:ADMIN');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/gerer_utilisateurs/Ajout', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('role:ADMIN');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
