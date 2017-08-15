<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');


/*Rutas del Censo*/

Route::resource('censo', 'Principal\CensoController');
//Editar Integrante de la Ficha Familiar
Route::get('grupo-familiar/{id}/censo/edit', 'Principal\CensoController@edit')->name('personagrupo-familiar.edit');
//Editar datos de la ficha
Route::put('/grupo-familiar/{id}/censo/update', 'Principal\CensoController@update')->name('grupo-familiar-update');



/*ayuda*/
Route::get('grupo-familiar/{id}/personas', 'Principal\PersonaController@index');
Route::get('grupo-familiar/{id}/persona/new', 'Principal\PersonaController@create')->name('personagrupo-familiar.new');


Route::POST('grupo-familiar/{id}/persona/store', 'Principal\PersonaController@store')->name('idGrupoFamiliar');




Route::resource('personas', 'Principal\PersonaController');
Route::get('/censo/{id}/actividades', 'Principal\CensoController@byactividad');
