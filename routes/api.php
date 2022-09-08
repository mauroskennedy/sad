<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/representantes/{id}/distritos','App\Http\Controllers\UrbanizacionController@byDistrtito');


Route::get('/representantes2/{id}/distritos','App\Http\Controllers\MesadirectivaController@byDistrtito');