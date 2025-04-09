<?php

namespace App\Http\Controllers\PasosSixmab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasosSixmab\MonitoreoMedicion;
use App\Models\Dispositivo\Dispositivo;
use App\Models\Dispositivo\DetalleDispositivo;
use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use App\Models\Procesos\Planta;
use App\Models\Procesos\PasoSixmabBateria;
use Carbon\Carbon;
use DB;

class MedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bateria = Bateria::find($id);
        $maquinaria = $bateria->maquinaria;
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;

        $data = DB::table('medicion')
            ->select('corriente','temperatura0','temperatura1','temperatura2','temperatura3','temperatura4','temperatura5')
            ->take(1)
            ->orderBy('created_at','DESC')  
            ->get();
    
        $dispositivo_maestro = Bateria::where('id', $bateria->id)->select('dispositivo_id')->get()->first(); 
        $disp = DetalleDispositivo::where('dispositivo_id', $dispositivo_maestro->dispositivo_id)->get()->first(); 

        return view('pasosixmab.monitoreo.index', compact('disp','data', 'bateria', 'maquinaria'));
    }

    public function obtener_mediciones($bateria)
    {
        $fecha = Carbon::now();
        $minutos = 60;
        $fecha = $fecha->subMinutes($minutos);
        $mediciones = MonitoreoMedicion::where('bateria_id', $bateria)->where('created_at', '>=', $fecha)->orderBy('id')->where('voltajeTotal', '!=', null)->get();
        return $mediciones;
    }

    public function obtener_ultima_medicion($bateria)
    {
        $fecha = Carbon::now();
        $minutos = 60;
        $fecha = $fecha->subMinutes($minutos);
        $medicion = MonitoreoMedicion::where('bateria_id', $bateria)->orderBy('id')->where('created_at', '>=', $fecha)->get()->last();
        return $medicion;
    }

    public function obtener_variable($bateria, $last_medicion = null, $variable = null)
    {
        $fecha = Carbon::now();
        $minutos = 60;
        $fecha = $fecha->subMinutes($minutos);
        $medicion = MonitoreoMedicion::where('bateria_id', $bateria)->where('created_at', '>=', $fecha)->where('id', '>', $last_medicion)->where('voltajeTotal', '!=', null)->get()->last();
        if($medicion) {
            if($variable != null){
                $valor = $medicion->$variable;
                $hora = $medicion->created_at;
                return compact('valor', 'hora');
            }
            return $medicion;
        }
        return 0;
    }

    public function celdas($id)
    {
        $bateria = Bateria::find($id);
        $maquinaria = $bateria->maquinaria;
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;

        $dispositivo_maestro = Bateria::where('id', $bateria->id)->select('dispositivo_id')->get()->first(); 
        $disp = DetalleDispositivo::where('dispositivo_id', $dispositivo_maestro->dispositivo_id)->get()->first(); 

        return view('pasosixmab.monitoreo.celdas', compact('disp','bateria', 'maquinaria'));
    }

    public function celda(Request $request, $id, $celda)
    {        
        $bateria = Bateria::find($id);
        $maquinaria = $bateria->maquinaria;
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;

        $dispositivo_maestro = Bateria::where('id', $bateria->id)->select('dispositivo_id')->get()->first(); 
        $disp = DetalleDispositivo::where('dispositivo_id', $dispositivo_maestro->dispositivo_id)->get()->first(); 
       
        return view('pasosixmab.monitoreo.celda', compact('disp','bateria', 'maquinaria','celda'));
    }

    public function generar_medicion()
    {
        
        $factor = 10;
        $disp = Dispositivo::find(1);

        $medicion = new MonitoreoMedicion();

        $medicion->corriente = rand(($disp->corriente_min-50) * $factor, ($disp->corriente_max + 10) * $factor) / $factor;

        $medicion->voltajeTotal = rand(($disp->voltaje_min * $cantidad_celda-10) * $factor,($disp->voltaje_max * $cantidad_celda + 10) * $factor) / $factor;
        
        for ($i=0; $i < $bateria->cantidad_temperatura; $i++) { 
            $var = 'temperatura'.$i;
            $medicion->$var = rand(($disp->temperatura_min - 10) * $factor, ($disp->temperatura_max + 10) * $factor) / $factor;
        }
        
        for ($i=0; $i < $bateria->cantidad_celda; $i++) { 
            $var = 'voltaje'.$i;
            $medicion->$var = rand(($disp->voltaje_min - 0.2) * $factor, ($disp->voltaje_max + 0.2) * $factor) / $factor;
        }

        $medicion->bateria_id = 3;
        $medicion->maestro_id = 3;

        $rs = $medicion->save();
        
        if($rs){
            return 'medicion creada '.$medicion->id;
        }

        return 0;
    }

    public function todo($id)
    {
        $bateria = Bateria::find($id);
        $maquinaria = $bateria->maquinaria;
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;

        $data = DB::table('medicion')
            ->select('corriente','temperatura0','temperatura1','temperatura2','temperatura3','temperatura4','temperatura5')
            ->take(1)
            ->orderBy('created_at','DESC')  
            ->get();
    
        $dispositivo_maestro = Bateria::where('id', $bateria->id)->select('dispositivo_id')->get()->first(); 
        $disp = DetalleDispositivo::where('dispositivo_id', $dispositivo_maestro->dispositivo_id)->get()->first(); 

        return view('pasosixmab.monitoreo.todo', compact('disp','data', 'bateria', 'maquinaria'));
    }
}