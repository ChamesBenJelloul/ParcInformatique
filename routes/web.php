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
Route::get('/gerer_equipements', 'PagesController@gerer_equipements');
Route::get('/consulter_services', 'PagesController@consulter_services');
Route::get('/gerer_utilisateurs', 'PagesController@gerer_utilisateurs');

