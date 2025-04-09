<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PasosSixmab\MonitoreoMedicion;
use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use DB;

class DatosController extends Controller
{
    public function index() 
    {
        $cantidad = DB::table('medicion')
        ->join('dispositivo', 'medicion.maestro_id', '=', 'dispositivo.id')
        ->select('medicion.maestro_id', DB::raw('count(*) as total'),'dispositivo.identificador')
        ->groupBy('medicion.maestro_id','dispositivo.identificador')
        ->get();

        return view('reportes.datos', compact('cantidad'));
    }
}