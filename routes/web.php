<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

/*RUTAS-IDIOMAS*/
    Route::get('idioma/{lang}', function($lang) { \Session::put('lang', $lang); return \Redirect::back();})->middleware('web')->name('change_lang');
/*FIN-RUTAS-IDIOMAS*/

//---------------------------------------------------------------------- Session -------- //

    //RUTAS-Session

        Route::middleware('auth')->group(function() {
            Route::get('/sessions', function () {

                $sessions = DB::table('sessions')
                ->join('users','users.id','=','sessions.user_id')
                ->select('sessions.*','users.name')
                ->orderBy('last_activity', 'DESC')
                ->get(); 
                
                return view('sessions', ['sessions' => $sessions]);
            });
            Route::post('/delete-session', function(Request $request) {
                DB::table('sessions')
                ->where('id', $request->id)
                ->delete();
            });
        });

    //FIN-Session

//---------------------------------------------------------------------- Fin del Session -------- //
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group( function() {

    Route::get('dashboard-user', 'Dashboard\DashboardUserController@index')->name('dashboard.index');

    //---------------------------------------------------------------------- Seguridad -------- //

        /*RUTAS-USUARIO*/
            Route::get('usuarios', 'Seguridad\UsuarioController@index')->name('usuarios.index')->middleware('has.permission:usuarios.index');
            Route::get('usuarios/create', 'Seguridad\UsuarioController@create')->name('usuarios.create')->middleware('has.permission:usuarios.create');
            Route::post('usuarios', 'Seguridad\UsuarioController@store')->name('usuarios.store')->middleware('has.permission:usuarios.create');
            Route::get('usuarios/{usuario}/editar', 'Seguridad\UsuarioController@edit')->name('usuarios.edit')->middleware('has.permission:usuarios.edit');
            Route::put('usuarios/{usuario}', 'Seguridad\UsuarioController@update')->name('usuarios.update')->middleware('has.permission:usuarios.edit');
            Route::get('usuarios/{usuario}', 'Seguridad\UsuarioController@show')->name('usuarios.show')->middleware('has.permission:usuarios.show');
            Route::delete('usuarios/{usuario}', 'Seguridad\UsuarioController@destroy')->name('usuarios.destroy')->middleware('has.permission:usuarios.destroy');
            Route::patch('usuarios/{usuario}/deactivate', 'Seguridad\UsuarioController@deactivate')->name('usuarios.deactivate')->middleware('has.permission:usuarios.inhabilitar');
            Route::patch('usuarios/{usuario}/activate', 'Seguridad\UsuarioController@activate')->name('usuarios.activate')->middleware('has.permission:usuarios.inhabilitar');
        /*FIN-RUTAS-USUARIO*/

        /*RUTAS-ROL*/
            Route::get('roles', 'Seguridad\RolController@index')->name('roles.index')->middleware('has.permission:roles.index');
            Route::get('roles/create', 'Seguridad\RolController@create')->name('roles.create')->middleware('has.permission:roles.create');
            Route::post('roles', 'Seguridad\RolController@store')->name('roles.store')->middleware('has.permission:roles.create');
            Route::get('roles/{role}/edit', 'Seguridad\RolController@edit')->name('roles.edit')->middleware('has.permission:roles.edit');
            Route::put('roles/{role}', 'Seguridad\RolController@update')->name('roles.update')->middleware('has.permission:roles.edit');
            Route::get('roles/{role}', 'Seguridad\RolController@show')->name('roles.show')->middleware('has.permission:roles.show');
            Route::delete('roles/{role}', 'Seguridad\RolController@destroy')->name('roles.destroy')->middleware('has.permission:roles.destroy');
        /*FIN-RUTAS-ROL*/

        /*RUTAS-PERMISOS*/
            Route::get('permisos', 'Seguridad\PermisoController@index')->name('permisos.index')->middleware('has.permission:permisos.index');
            Route::get('permisos/create', 'Seguridad\PermisoController@create')->name('permisos.create')->middleware('has.permission:permisos.create');
            Route::post('permisos', 'Seguridad\PermisoController@store')->name('permisos.store')->middleware('has.permission:permisos.create');
            Route::get('permisos/{permiso}/editar', 'Seguridad\PermisoController@edit')->name('permisos.edit')->middleware('has.permission:permisos.edit');
            Route::put('permisos/{permiso}', 'Seguridad\PermisoController@update')->name('permisos.update')->middleware('has.permission:permisos.edit');
            Route::get('permisos/{permiso}', 'Seguridad\PermisoController@show')->name('permisos.show')->middleware('has.permission:permisos.show');
            Route::delete('permisos/{permiso}', 'Seguridad\PermisoController@destroy')->name('permisos.destroy')->middleware('has.permission:permisos.destroy');
        /*FIN-RUTAS-PERMISOS*/

        /*RUTAS-PERMISO-ROL*/
            Route::get('permisos_roles', 'Seguridad\PermisoRolController@index')->name('permisos_roles')->middleware('has.permission:permisos_roles.index');
            Route::post('permisos_roles', 'Seguridad\PermisoRolController@store')->name('guardar_permiso_rol')->middleware('has.permission:guardar_permiso_rol.store');
        /*FIN-RUTAS-PERMISO-ROL*/

    //---------------------------------------------------------------------- Fin Seguridad -------- //

    //---------------------------------------------------------------------- Procesos -------- //

        /*RUTAS-EMPRESA*/
            Route::get('empresas', 'Procesos\EmpresaController@index')->name('empresas.index')->middleware('has.permission:empresas.index');
            Route::get('empresas/create', 'Procesos\EmpresaController@create')->name('empresas.create')->middleware('has.permission:empresas.create');
            Route::post('empresas', 'Procesos\EmpresaController@store')->name('empresas.store')->middleware('has.permission:empresas.create');
            Route::get('empresas/{empresa}/editar', 'Procesos\EmpresaController@edit')->name('empresas.edit')->middleware('has.permission:empresas.edit');
            Route::put('empresas/{empresa}', 'Procesos\EmpresaController@update')->name('empresas.update')->middleware('has.permission:empresas.edit');
            Route::get('empresas/{empresa}', 'Procesos\EmpresaController@show')->name('empresas.show')->middleware('has.permission:empresas.show');
            Route::delete('empresas/{empresa}', 'Procesos\EmpresaController@destroy')->name('empresas.destroy')->middleware('has.permission:empresas.destroy');
            Route::patch('empresas/{empresa}/deactivate', 'Procesos\EmpresaController@deactivate')->name('empresas.deactivate')->middleware('has.permission:empresas.inhabilitar');
            Route::patch('empresas/{empresa}/activate', 'Procesos\EmpresaController@activate')->name('empresas.activate')->middleware('has.permission:empresas.inhabilitar');
        /*FIN-RUTAS-EMPRESA*/

        /*RUTAS-EMPRESA-PLANTA*/
            Route::get('empresas/{empresa}/plantas', 'Procesos\PlantaController@index')->name('empresas.plantas.index')->middleware('has.permission:plantas.index');
            Route::get('empresas/{empresa}/plantas/create', 'Procesos\PlantaController@create')->name('empresas.plantas.create')->middleware('has.permission:plantas.create');
            Route::post('empresas/{empresa}/plantas', 'Procesos\PlantaController@store')->name('empresas.plantas.store')->middleware('has.permission:plantas.create');
            Route::get('plantas/{planta}/editar', 'Procesos\PlantaController@edit')->name('plantas.edit')->middleware('has.permission:plantas.edit');
            Route::put('plantas/{planta}', 'Procesos\PlantaController@update')->name('plantas.update')->middleware('has.permission:plantas.edit');
            Route::get('plantas/{planta}', 'Procesos\PlantaController@show')->name('plantas.show')->middleware('has.permission:plantas.show');
            Route::delete('plantas/{planta}', 'Procesos\PlantaController@destroy')->name('plantas.destroy')->middleware('has.permission:plantas.destroy');
            Route::patch('plantas/{planta}/deactivate', 'Procesos\PlantaController@deactivate')->name('plantas.deactivate')->middleware('has.permission:plantas.inhabilitar');
            Route::patch('plantas/{planta}/activate', 'Procesos\PlantaController@activate')->name('plantas.activate')->middleware('has.permission:plantas.inhabilitar');
        /*FIN-RUTAS-EMPRESA-PLANTA*/

        //RUTAS-PLANTA MAQUINARIA 
            Route::get('plantas/{planta}/maquinarias', 'Procesos\MaquinariaController@index')->name('plantas.maquinarias.index')->middleware('has.permission:maquinarias.index');
            Route::get('plantas/{planta}/maquinarias/create', 'Procesos\MaquinariaController@create')->name('plantas.maquinarias.create')->middleware('has.permission:maquinarias.create');
            Route::post('plantas/{planta}/maquinarias', 'Procesos\MaquinariaController@store')->name('plantas.maquinarias.store')->middleware('has.permission:maquinarias.create');
            Route::get('maquinarias/{maquinaria}/editar', 'Procesos\MaquinariaController@edit')->name('maquinarias.edit')->middleware('has.permission:maquinarias.edit');
            Route::put('maquinarias/{maquinaria}', 'Procesos\MaquinariaController@update')->name('maquinarias.update')->middleware('has.permission:maquinarias.edit');
            Route::get('maquinarias/{maquinaria}', 'Procesos\MaquinariaController@show')->name('maquinarias.show')->middleware('has.permission:maquinarias.show');
            Route::delete('maquinarias/{maquinaria}', 'Procesos\MaquinariaController@destroy')->name('maquinarias.destroy')->middleware('has.permission:maquinarias.destroy');
            Route::patch('maquinarias/{maquinaria}/deactivate', 'Procesos\MaquinariaController@deactivate')->name('maquinarias.deactivate')->middleware('has.permission:maquinarias.inhabilitar');
            Route::patch('maquinarias/{maquinaria}/activate', 'Procesos\MaquinariaController@activate')->name('maquinarias.activate')->middleware('has.permission:maquinarias.inhabilitar');
        //FIN-PLANTA MAQUINARIA 

        //RUTAS-BATERIA
            Route::get('maquinarias/{maquinaria}/baterias', 'Procesos\BateriaController@index')->name('maquinarias.baterias.index')->middleware('has.permission:baterias.index');
            Route::get('maquinarias/{maquinaria}/baterias/create', 'Procesos\BateriaController@create')->name('maquinarias.baterias.create')->middleware('has.permission:baterias.create');
            Route::post('maquinarias/{maquinaria}/baterias', 'Procesos\BateriaController@store')->name('maquinarias.baterias.store')->middleware('has.permission:baterias.create');
            Route::get('baterias/{bateria}/editar', 'Procesos\BateriaController@edit')->name('baterias.edit')->middleware('has.permission:baterias.edit');
            Route::put('baterias/{bateria}', 'Procesos\BateriaController@update')->name('baterias.update')->middleware('has.permission:baterias.edit');
            Route::get('baterias/{bateria}', 'Procesos\BateriaController@show')->name('baterias.show')->middleware('has.permission:baterias.show');
            Route::delete('baterias/{bateria}', 'Procesos\BateriaController@destroy')->name('baterias.destroy')->middleware('has.permission:baterias.destroy');
            Route::patch('baterias/{bateria}/deactivate', 'Procesos\BateriaController@deactivate')->name('baterias.deactivate')->middleware('has.permission:baterias.inhabilitar');
            Route::patch('baterias/{bateria}/activate', 'Procesos\BateriaController@activate')->name('baterias.activate')->middleware('has.permission:baterias.inhabilitar');
            Route::get('plantas/{planta}/baterias', 'Procesos\BateriaController@plantas')->name('plantas.baterias')->middleware('has.permission:baterias.bateria');
        //FIN-RUTAS-BATERIA

    //---------------------------------------------------------------------- Fin Procesos -------- //

    //---------------------------------------------------------------------- Pasos Sixmab -------- //

        /*RUTAS-BATERIA-LEVANTAMIENTO*/
            Route::get('baterias/{bateria}/levantamiento', 'PasosSixmab\LevantamientoController@index')->name('baterias.levantamiento.index')->middleware('has.permission:levantamiento.index');
            Route::get('baterias/{bateria}/levantamiento/create', 'PasosSixmab\LevantamientoController@create')->name('baterias.levantamiento.create')->middleware('has.permission:levantamiento.create');
            Route::post('baterias/{bateria}/levantamiento', 'PasosSixmab\LevantamientoController@store')->name('baterias.levantamiento.store')->middleware('has.permission:levantamiento.create');
            Route::get('levantamiento/{levantamiento}/editar', 'PasosSixmab\LevantamientoController@edit')->name('levantamiento.edit')->middleware('has.permission:levantamiento.edit');
            Route::put('levantamiento/{levantamiento}', 'PasosSixmab\LevantamientoController@update')->name('levantamiento.update')->middleware('has.permission:levantamiento.edit');
            Route::delete('levantamiento/{levantamiento}', 'PasosSixmab\LevantamientoController@destroy')->name('levantamiento.destroy')->middleware('has.permission:levantamiento.destroy');
        /*FIN-RUTAS-BATERIA-LEVANTAMIENTO*/

        /*RUTAS-BATERIA-DIAGOSTICO*/
            Route::get('baterias/{bateria}/diagnostico', 'PasosSixmab\DiagnosticoController@index')->name('baterias.diagnostico.index')->middleware('has.permission:diagnostico.index');
            Route::get('baterias/{bateria}/diagnostico/create', 'PasosSixmab\DiagnosticoController@create')->name('baterias.diagnostico.create')->middleware('has.permission:diagnostico.create');
            Route::post('baterias/{bateria}/diagnostico', 'PasosSixmab\DiagnosticoController@store')->name('baterias.diagnostico.store')->middleware('has.permission:diagnostico.create');
            Route::get('diagnostico/{diagnostico}/editar', 'PasosSixmab\DiagnosticoController@edit')->name('diagnostico.edit')->middleware('has.permission:diagnostico.edit');
            Route::put('diagnostico/{diagnostico}', 'PasosSixmab\DiagnosticoController@update')->name('diagnostico.update')->middleware('has.permission:diagnostico.edit');
            Route::delete('diagnostico/{diagnostico}', 'PasosSixmab\DiagnosticoController@destroy')->name('diagnostico.destroy')->middleware('has.permission:diagnostico.destroy');
        /*FIN-RUTAS-BATERIA-DIAGOSTICO*/

        /*RUTAS-BATERIA-REGENERACION*/
            Route::get('baterias/{bateria}/regeneracion', 'PasosSixmab\RegeneracionController@index')->name('baterias.regeneracion.index')->middleware('has.permission:regeneracion.index');
            Route::get('baterias/{bateria}/regeneracion/create', 'PasosSixmab\RegeneracionController@create')->name('baterias.regeneracion.create')->middleware('has.permission:regeneracion.create');
            Route::post('baterias/{bateria}/regeneracion', 'PasosSixmab\RegeneracionController@store')->name('baterias.regeneracion.store')->middleware('has.permission:regeneracion.create');
            Route::get('regeneracion/{regeneracion}/editar', 'PasosSixmab\RegeneracionController@edit')->name('regeneracion.edit')->middleware('has.permission:regeneracion.edit');
            Route::put('regeneracion/{regeneracion}', 'PasosSixmab\RegeneracionController@update')->name('regeneracion.update')->middleware('has.permission:regeneracion.edit');
            Route::delete('regeneracion/{regeneracion}', 'PasosSixmab\RegeneracionController@destroy')->name('regeneracion.destroy')->middleware('has.permission:regeneracion.destroy');
        /*FIN-RUTAS-BATERIA-REGENERACION*/

    //---------------------------------------------------------------------- Fin Pasos Sixmab -------- //

    //---------------------------------------------------------------------- TablaSistema -------- //
    
        //RUTAS-TIPO-PASOS-SIXMAB
            Route::get('tipos_pasosixmab', 'TablaSistema\TipoPasoSixmabController@index')->name('tipos_pasosixmab.index')->middleware('has.permission:tipos_pasosixmab.index');
            Route::get('tipos_pasosixmab/create', 'TablaSistema\TipoPasoSixmabController@create')->name('tipos_pasosixmab.create')->middleware('has.permission:tipos_pasosixmab.create');
            Route::post('tipos_pasosixmab', 'TablaSistema\TipoPasoSixmabController@store')->name('tipos_pasosixmab.store')->middleware('has.permission:tipos_pasosixmab.create');
            Route::get('tipos_pasosixmab/{tipo_pasosixmab}/editar', 'TablaSistema\TipoPasoSixmabController@edit')->name('tipos_pasosixmab.edit')->middleware('has.permission:tipos_pasosixmab.edit');
            Route::put('tipos_pasosixmab/{tipo_pasosixmab}', 'TablaSistema\TipoPasoSixmabController@update')->name('tipos_pasosixmab.update')->middleware('has.permission:tipos_pasosixmab.edit');
            Route::get('tipos_pasosixmab/{tipo_pasosixmab}', 'TablaSistema\TipoPasoSixmabController@show')->name('tipos_pasosixmab.show')->middleware('has.permission:tipos_pasosixmab.show');
            Route::delete('tipos_pasosixmab/{tipo_pasosixmab}', 'TablaSistema\TipoPasoSixmabController@destroy')->name('tipos_pasosixmab.destroy')->middleware('has.permission:tipos_pasosixmab.destroy'); 
            Route::patch('tipos_pasosixmab/{tipo_pasosixmab}/deactivate', 'TablaSistema\TipoPasoSixmabController@deactivate')->name('tipos_pasosixmab.deactivate')->middleware('has.permission:tipos_pasosixmab.inhabilitar');
            Route::patch('tipos_pasosixmab/{tipo_pasosixmab}/activate', 'TablaSistema\TipoPasoSixmabController@activate')->name('tipos_pasosixmab.activate')->middleware('has.permission:tipos_pasosixmab.inhabilitar');      
        //FIN-RUTAS-TIPO-PASOS-SIXMAB

        //RUTAS-TIPO-MAQUINARIA
            Route::get('tipos_maquinarias', 'TablaSistema\TipoMaquinariaController@index')->name('tipos_maquinarias.index')->middleware('has.permission:tipos_maquinarias.index');
            Route::get('tipos_maquinarias/create', 'TablaSistema\TipoMaquinariaController@create')->name('tipos_maquinarias.create')->middleware('has.permission:tipos_maquinarias.create');
            Route::post('tipos_maquinarias', 'TablaSistema\TipoMaquinariaController@store')->name('tipos_maquinarias.store')->middleware('has.permission:tipos_maquinarias.create');
            Route::get('tipos_maquinarias/{tipo_maquinaria}/editar', 'TablaSistema\TipoMaquinariaController@edit')->name('tipos_maquinarias.edit')->middleware('has.permission:tipos_maquinarias.edit');
            Route::put('tipos_maquinarias/{tipo_maquinaria}', 'TablaSistema\TipoMaquinariaController@update')->name('tipos_maquinarias.update')->middleware('has.permission:tipos_maquinarias.edit');
            Route::get('tipos_maquinarias/{tipo_maquinaria}', 'TablaSistema\TipoMaquinariaController@show')->name('tipos_maquinarias.show')->middleware('has.permission:tipos_maquinarias.show');
            Route::delete('tipos_maquinarias/{tipo_maquinaria}', 'TablaSistema\TipoMaquinariaController@destroy')->name('tipos_maquinarias.destroy')->middleware('has.permission:tipos_maquinarias.destroy'); 
            Route::patch('tipos_maquinarias/{tipo_maquinaria}/deactivate', 'TablaSistema\TipoMaquinariaController@deactivate')->name('tipos_maquinarias.deactivate')->middleware('has.permission:tipos_maquinarias.inhabilitar');
            Route::patch('tipos_maquinarias/{tipo_maquinaria}/activate', 'TablaSistema\TipoMaquinariaController@activate')->name('tipos_maquinarias.activate')->middleware('has.permission:tipos_maquinarias.inhabilitar');      
        //FIN-RUTAS-TIPO-MAQUINARIA

        //RUTAS-TIPO-BATERIA
            Route::get('tipos_baterias', 'TablaSistema\TipoBateriaController@index')->name('tipos_baterias.index')->middleware('has.permission:tipos_baterias.index');
            Route::get('tipos_baterias/create', 'TablaSistema\TipoBateriaController@create')->name('tipos_baterias.create')->middleware('has.permission:tipos_baterias.create');
            Route::post('tipos_baterias', 'TablaSistema\TipoBateriaController@store')->name('tipos_baterias.store')->middleware('has.permission:tipos_baterias.create');
            Route::get('tipos_baterias/{tipo_bateria}/editar', 'TablaSistema\TipoBateriaController@edit')->name('tipos_baterias.edit')->middleware('has.permission:tipos_baterias.edit');
            Route::put('tipos_baterias/{tipo_bateria}', 'TablaSistema\TipoBateriaController@update')->name('tipos_baterias.update')->middleware('has.permission:tipos_baterias.edit');
            Route::get('tipos_baterias/{tipo_bateria}', 'TablaSistema\TipoBateriaController@show')->name('tipos_baterias.show')->middleware('has.permission:tipos_baterias.show');
            Route::delete('tipos_baterias/{tipo_bateria}', 'TablaSistema\TipoBateriaController@destroy')->name('tipos_baterias.destroy')->middleware('has.permission:tipos_baterias.destroy'); 
            Route::patch('tipos_baterias/{tipo_bateria}/deactivate', 'TablaSistema\TipoBateriaController@deactivate')->name('tipos_baterias.deactivate')->middleware('has.permission:tipos_baterias.inhabilitar');
            Route::patch('tipos_baterias/{tipo_bateria}/activate', 'TablaSistema\TipoBateriaController@activate')->name('tipos_baterias.activate')->middleware('has.permission:tipos_baterias.inhabilitar');      
        //FIN-RUTAS-TIPO-BATERIA

        //RUTAS-COMPOSICIÓN-QUIMICA
            Route::get('composicion_quimica', 'TablaSistema\ComposicionQuimicaController@index')->name('composicion_quimica.index')->middleware('has.permission:composicion_quimica.index');
            Route::get('composicion_quimica/create', 'TablaSistema\ComposicionQuimicaController@create')->name('composicion_quimica.create')->middleware('has.permission:composicion_quimica.create');
            Route::post('composicion_quimica', 'TablaSistema\ComposicionQuimicaController@store')->name('composicion_quimica.store')->middleware('has.permission:composicion_quimica.create');
            Route::get('composicion_quimica/{composicion_quimica}/editar', 'TablaSistema\ComposicionQuimicaController@edit')->name('composicion_quimica.edit')->middleware('has.permission:composicion_quimica.edit');
            Route::put('composicion_quimica/{composicion_quimica}', 'TablaSistema\ComposicionQuimicaController@update')->name('composicion_quimica.update')->middleware('has.permission:composicion_quimica.edit');
            Route::get('composicion_quimica/{composicion_quimica}', 'TablaSistema\ComposicionQuimicaController@show')->name('composicion_quimica.show')->middleware('has.permission:composicion_quimica.show');
            Route::delete('composicion_quimica/{composicion_quimica}', 'TablaSistema\ComposicionQuimicaController@destroy')->name('composicion_quimica.destroy')->middleware('has.permission:composicion_quimica.destroy'); 
            Route::patch('composicion_quimica/{composicion_quimica}/deactivate', 'TablaSistema\ComposicionQuimicaController@deactivate')->name('composicion_quimica.deactivate')->middleware('has.permission:composicion_quimica.inhabilitar');
            Route::patch('composicion_quimica/{composicion_quimica}/activate', 'TablaSistema\ComposicionQuimicaController@activate')->name('composicion_quimica.activate')->middleware('has.permission:composicion_quimica.inhabilitar');      
        //FIN-RUTAS-COMPOSICIÓN-QUIMICA

    //---------------------------------------------------------------------- Fin TablaSistema -------- //

    //---------------------------------------------------------------------- Noticia -------- //

        Route::get('noticias', 'Noticias\NoticiaController@index')->name('noticias.index')->middleware('has.permission:noticias.index');
        Route::get('noticias/create', 'Noticias\NoticiaController@create')->name('noticias.create')->middleware('has.permission:noticias.create');
        Route::post('noticias', 'Noticias\NoticiaController@store')->name('noticias.store')->middleware('has.permission:noticias.create');
        Route::get('noticias/{noticia}/editar', 'Noticias\NoticiaController@edit')->name('noticias.edit')->middleware('has.permission:noticias.edit');
        Route::put('noticias/{noticia}', 'Noticias\NoticiaController@update')->name('noticias.update')->middleware('has.permission:noticias.edit');
        Route::get('noticias/{noticia}', 'Noticias\NoticiaController@show')->name('noticias.show')->middleware('has.permission:noticias.show');
        Route::delete('noticias/{noticia}', 'Noticias\NoticiaController@destroy')->name('noticias.destroy')->middleware('has.permission:noticias.destroy');
        Route::patch('noticias/{noticia}/deactivate', 'Noticias\NoticiaController@deactivate')->name('noticias.deactivate')->middleware('has.permission:noticias.inhabilitar');
        Route::patch('noticias/{noticia}/activate', 'Noticias\NoticiaController@activate')->name('noticias.activate')->middleware('has.permission:noticias.inhabilitar');

    //---------------------------------------------------------------------- Fin de la Noticia -------- //
    
    //---------------------------------------------------------------------- Logs -------- //

        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index')->middleware('has.permission:logs.index');

    //---------------------------------------------------------------------- Fin del Logs -------- //
   
    //---------------------------------------------------------------------- PASOS-SIXMAB -------- //

        Route::get('baterias/{bateria}/pasosixmab', 'Procesos\PasoSixmabController@index')->name('baterias.pasosixmab.index')->middleware('has.permission:pasosixmab.index');
        Route::get('pasosixmab/{pasosixmab}/redirect', 'Procesos\PasoSixmabController@redirect')->name('redirect');

    //---------------------------------------------------------------------- Fin del PASOS-SIXMAB -------- //

    //---------------------------------------------------------------------- PASOS-SIXMAB -------- //

        Route::get('dispositivos', 'Dispositivo\DispositivoController@index')->name('dispositivos.index')->middleware('has.permission:dispositivos.index');
        Route::get('dispositivos/create', 'Dispositivo\DispositivoController@create')->name('dispositivos.create')->middleware('has.permission:dispositivos.create');
        Route::post('dispositivos', 'Dispositivo\DispositivoController@store')->name('dispositivos.store')->middleware('has.permission:dispositivos.create');
        Route::get('dispositivos/{dispositivo}/editar', 'Dispositivo\DispositivoController@edit')->name('dispositivos.edit')->middleware('has.permission:dispositivos.edit');
        Route::put('dispositivos/{dispositivo}', 'Dispositivo\DispositivoController@update')->name('dispositivos.update')->middleware('has.permission:dispositivos.edit');
        Route::get('dispositivos/{dispositivo}', 'Dispositivo\DispositivoController@show')->name('dispositivos.show')->middleware('has.permission:dispositivos.show');
        Route::delete('dispositivos/{dispositivo}', 'Dispositivo\DispositivoController@destroy')->name('dispositivos.destroy')->middleware('has.permission:dispositivos.destroy');
        Route::patch('dispositivos/{dispositivo}/deactivate', 'Dispositivo\DispositivoController@deactivate')->name('dispositivos.deactivate')->middleware('has.permission:detalle_dispositivo.inhabilitar');
        Route::patch('dispositivos/{dispositivo}/activate', 'Dispositivo\DispositivoController@activate')->name('dispositivos.activate')->middleware('has.permission:detalle_dispositivo.inhabilitar');

    //---------------------------------------------------------------------- Fin del PASOS-SIXMAB -------- //

    //---------------------------------------------------------------------- ALARMAS -------- //

        Route::get('alarmas', 'AlarmasController@index')->name('alarmas.index');
        // Route::get('alarmas/{alarma_id}', 'AlarmasController@detalle')->name('alarmas.detalle');
        // Route::get('alarmas/notificaciones/num', 'AlarmasController@obtener_notificaciones')->name('alarmas.notificaciones');
        // Route::get('alarmas/actualizar/{alarma_id}', 'AlarmasController@actualizar_notificaciones')->name('alarmas.actualizar');
        // Route::post('alarmas/pdf/{alarma_id}', 'AlarmasController@generarPdf')->name('alarma.pdf');    
 
    //---------------------------------------------------------------------- Fin de las ALARMAS -------- //

    //---------------------------------------------------------------------- MONITOREO -------- //

        Route::get('monitoreo/{bateria}', 'PasosSixmab\MedicionController@index')->name('monitoreo.index')->middleware('has.permission:monitoreo.index');
        Route::get('monitoreo/{bateria}/celdas', 'PasosSixmab\MedicionController@celdas')->name('monitoreo.celdas')->middleware('has.permission:monitoreo.celdas');
        Route::get('monitoreo/{bateria}/celdas/{celda}', 'PasosSixmab\MedicionController@celda')->name('monitoreo.celda')->middleware('has.permission:monitoreo.celda');
        Route::get('monitoreo/{bateria}/todo/', 'PasosSixmab\MedicionController@todo')->name('monitoreo.todo')->middleware('has.permission:monitoreo.todo');

    //---------------------------------------------------------------------- Fin de las MONITOREO -------- //

    //---------------------------------------------------------------------- Reportes -------- //

        Route::get('reportes', 'Reportes\ReportesController@index')->name('reportes');
        Route::get('reportes/empresa/{empresa}/seleccionar', 'Reportes\ReportesController@seleccionar')->name('reportes.seleccionar');
        Route::get('reportes/empresa/{empresa}', 'Reportes\ReportesController@empresa')->name('reportes.empresa');
        Route::post('reportes/empresa/{empresa}/baterias/', 'Reportes\ReportesController@reportes_menu')->name('reportes.menu');
        Route::post('reportes/generarPdf/{empresa}/{tipo_reporte}', 'Reportes\ReportesController@generarPdf')->name('reportes.generar-pdf');
        Route::post('reportes/empresa/{empresa}/baterias/general', 'Reportes\ReportesController@reporte_general')->name('reportes.general');
        Route::post('reportes/empresa/{empresa}/baterias/variables', 'Reportes\ReportesController@reporte_variables')->name('reportes.variables');
        Route::get('reportes/mediciones/obtener/{empresa}', 'Reportes\ReportesController@obtener_mediciones_grafico')->name('reportes.obtener_mediciones');
        Route::get('reportes/empresa/{empresa}/{planta}/baterias', 'Reportes\ReportesController@obtenerBaterias');
        Route::get('reportes/tabla', 'Reportes\ReportesController@reporteTecnico');

    //---------------------------------------------------------------------- Fin de las Reportes -------- //

    //---------------------------------------------------------------------- CELDAS //

        Route::get('baterias/{bateria}/celdas', 'Procesos\CeldaController@index')->name('baterias.celdas.index')->middleware('has.permission:celdas.index');
        Route::get('baterias/{bateria}/celdas/create', 'Procesos\CeldaController@create')->name('baterias.celdas.create')->middleware('has.permission:celdas.create');
        Route::post('baterias/{bateria}/celdas', 'Procesos\CeldaController@store')->name('baterias.celdas.store')->middleware('has.permission:celdas.create');
        Route::get('celdas/{celda}/editar', 'Procesos\CeldaController@edit')->name('celdas.edit')->middleware('has.permission:celdas.edit');
        Route::put('celdas/{celda}', 'Procesos\CeldaController@update')->name('celdas.update')->middleware('has.permission:celdas.edit');
        Route::get('celdas/{celda}', 'Procesos\CeldaController@show')->name('celdas.show')->middleware('has.permission:celdas.show');
        Route::delete('celdas/{celda}', 'Procesos\CeldaController@destroy')->name('celdas.destroy')->middleware('has.permission:celdas.destroy');
        Route::get('celdas/dispositivos/{maestro_id}', 'Procesos\CeldaController@cargar_dispositivos')->name('celdas.dispositivos.cargar_dispostivos');

    //---------------------------------------------------------------------- Fin de las CELDAS //

    //---------------------------------------------------------------------- DATOS //

        Route::get('datos', 'Reportes\DatosController@index')->name('datos.index')->middleware('has.permission:datos.index');

    //---------------------------------------------------------------------- Fin de los DATOS //



















    //RUTAS-REPORTES
        // Route::get('reportes/empresas', 'Estadisticas\ReportesController@empresa')->name('reportes.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/empresas/general', 'Estadisticas\ReportesController@empresa_pdfgeneral')->name('empresa-pdfgeneral.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/empresas/{empresa}', 'Estadisticas\ReportesController@empresa_pdfindividual')->name('empresa-pdfindividual.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/plantas', 'Estadisticas\ReportesController@planta')->name('reportes.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/plantas/general', 'Estadisticas\ReportesController@planta_pdfgeneral')->name('planta-pdfgeneral.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/plantas/{planta}', 'Estadisticas\ReportesController@planta_pdfindividual')->name('planta-pdfindividual.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/sistemas', 'Estadisticas\ReportesController@maquinaria')->name('reportes.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/sistemas/general', 'Estadisticas\ReportesController@maquinaria_pdfgeneral')->name('maquinaria-pdfgeneral.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/sistemas/{maquinaria}', 'Estadisticas\ReportesController@maquinaria_pdfindividual')->name('maquinaria-pdfindividual.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/baterias', 'Estadisticas\ReportesController@bateria')->name('reportes.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/baterias/general', 'Estadisticas\ReportesController@bateria_pdfgeneral')->name('bateria-pdfgeneral.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/baterias/{bateria}', 'Estadisticas\ReportesController@bateria_pdfindividual')->name('bateria-pdfindividual.index')->middleware('has.permission:reportes.index');
        // Route::get('reportes/monitoreo-mediciones', 'Estadisticas\ReportesController@monitoreo')->name('reportes.index')->middleware('has.permission:reportes.index');
    //FIN-RUTAS-REPORTES
});