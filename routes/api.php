<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTA-API
    Route::get('/conexion/{dispositivo_id}', 'ConexionController@captar_datos');
//FIN-API

//RUTA-GRAFICOS
    Route::get('monitoreo/{bateria}/medicion/{last_medicion?}/{variable?}', 'PasosSixmab\MedicionController@obtener_variable')->name('monitoreo.medicion');
    Route::get('monitoreo/{bateria}/mediciones', 'PasosSixmab\MedicionController@obtener_mediciones')->name('monitoreo.mediciones');
    Route::get('monitoreo/{bateria}/medicione', 'PasosSixmab\MedicionController@obtener_ultima_medicion')->name('monitoreo.ultima_medicion');
    Route::get('generar_medicion', 'PasosSixmab\MedicionController@generar_medicion')->name('generar_medicion');
//FIN-GRAFICOS