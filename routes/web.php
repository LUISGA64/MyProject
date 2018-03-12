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
Route::get('grupo-familiar/{id}/censo/show', 'Principal\CensoController@show')->name('grupo-familiar.show');
Route::get('grupo-familiar-index', 'Principal\CensoController@index')->name('grupo-familiar-index');
Route::get('grupo-familiar-create', 'Principal\CensoController@create')->name('grupo-familiar-create');

/*personas*/
Route::get('personas-grupofamiliar', 'Principal\PersonaController@index')->name('personagrupo-familiar.index');
Route::get('persona-censoweb-create/{id}/persona/new', 'Principal\PersonaController@create')->name('personagrupo-familiar.new');
Route::POST('persona-censoweb/{id}/persona/store', 'Principal\PersonaController@store')->name('idGrupoFamiliar');
Route::get('persona-censoweb/{id}/edit', 'Principal\PersonaController@edit')->name('persona-censoweb-edit');
Route::PUT('persona-censoweb/{id}/update', 'Principal\PersonaController@update')->name('persona-censoweb-update');
//Route::resource('personas', 'Principal\PersonaController');

/*catalogo actividades*/
Route::get('/censo/{id}/actividades', 'Principal\CensoController@byactividad');

/*Ruta Resguardo Indigena*/
//Route::resource('resguardo-indigena', 'Principal\ResguardoController');
Route::get('resguardo-indigena-create','Principal\ResguardoController@create')->name('resguardo-create');
Route::get('resguardo-indigena-index','Principal\ResguardoController@index')->name('resguardo-index');
Route::POST('resguardo-indigena-store','Principal\ResguardoController@store')->name('resguardo-store');
Route::get('resguardo-indigena-edit/{id}', 'Principal\ResguardoController@edit')->name('resguardo-edit');
Route::PUT('resguardo-indigena-update/{id}', 'Principal\ResguardoController@update')->name('resguardo-update');


/*Cabildo Controller*/
//Route::get('cabildo-indigena-create','Principal\CabildoController@create')->name('cabildo-create');
//Route::get('cabildo-indigena-index','Principal\CabildoController@index')->name('cabildo-index');

Route::resource('cabildo','Principal\CabildoController');

/// Avales del Cabildo
Route::get('resguardo-aval-index','Principal\AvalController@index')->name('aval-index');
Route::get('resguardo-aval-{id}-create', 'Principal\AvalController@create')->name('aval-create');
Route::POST('resguardo-aval-store', 'Principal\AvalController@store')->name('aval-store');
Route::get('resguardo/aval/show', 'Principal\AvalController@show')->name('aval.show');
Route::get('descargar-{id}-aval', 'Principal\AvalController@avalPdf')->name('aval-pdf');
Route::get('resguardo-aval-excel', 'Principal\AvalController@excel')->name('aval-excel');



Route::get('pdf', function(){
	$pdf = PDF::loadView('censoweb.aval.pdf');
	return $pdf->download('archivo.pdf');
});

//Reportes
Route::get('reporte-viviendas','Principal\ReportController@viviendas')->name('report-viviendas');
Route::get('reporte-pisos','Principal\ReportController@pisos')->name('report-pisos');