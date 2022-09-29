<?php

use Illuminate\Support\Facades\Route;

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


 Route::get('/', function () {
     return view('auth.login');
 });



//Route::resource('/', 'App\Http\Controllers\PaneldistritosController');

/*Route::resource('/', 'App\Http\Controllers\MesadirectivaController');*/

Route::resource('estadisticas','App\Http\Controllers\EstadisticaController');

Route::resource('distritos','App\Http\Controllers\DistritoController');

Route::resource('cargos','App\Http\Controllers\CargoController');

Route::resource('urbanizaciones','App\Http\Controllers\UrbanizacionController');

Route::resource('urbanizacionesPanel','App\Http\Controllers\UrbanizacionPanelController');

Route::resource('representantes','App\Http\Controllers\RepresentanteController');

Route::resource('mesadirectivas','App\Http\Controllers\MesadirectivaController');

Route::resource('panelDistrito','App\Http\Controllers\PaneldistritosController');

Route::resource('panelsDespacho','App\Http\Controllers\PanelDespachoController');

Route::get('/mesadirectivasDistritos/{id}/urbanizacionByDistrito','App\Http\Controllers\MesadirectivaController@urbanizacionByDistrito');

Route::get('/mesadirectivasDistritos2/{id}/mesaDirectivaByUrbanizacion','App\Http\Controllers\MesadirectivaController@mesaDirectivaByUrbanizacion');

Route::get('/mesadirectivasDistritos3/{id}/urbanizacionByDistrito','App\Http\Controllers\PanelDespachoController@urbanizacionByDistrito');

Route::get('/mesadirectivasDistritos4/{id}/urbanizacionByDistrito','App\Http\Controllers\PanelDespachoController@urbanizacionByDistrito2');

Route::get('/panel/{id}/urbanizacionByDistrito','App\Http\Controllers\PaneldistritosController@urbanizacionByDistrito');

Route::resource('posicion','App\Http\Controllers\PosicionController');

Route::resource('area','App\Http\Controllers\AreaController');

Route::resource('personal','App\Http\Controllers\PersonalController');

Route::resource('dependencia','App\Http\Controllers\DependenciaController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
