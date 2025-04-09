<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Procesos\Empresa;
use App\Models\Procesos\Planta;
use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use App\Models\Dispositivo\Dispositivo;
use App\Models\Dispositivo\DetalleDispositivo;
use App\Models\PasosSixmab\MonitoreoMedicion;
use App\Models\Alarma;
use Carbon\Carbon;
use PDF;
use DB;

class ReportesController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuariosixmab = \Auth::user()->id; 

        $nombre = $request->get('nombre');
        $id = app('request')->input('id');

        if ($usuariosixmab == 1) {
            $empresas = Empresa::orderByDesc('estado')
            ->orderBy('siglas','ASC')
            ->paginate();
        } else {
            $empresas = DB::table('usuario_empresa')
            ->join('empresa','empresa.id','=','usuario_empresa.empresa_id')
            ->select('empresa.nombre','empresa.id','empresa.estado','empresa.siglas')
            ->where('user_id', $usuariosixmab)
            ->get(); 
        }
        return view('reportes.inicio', compact('empresas'));
    }

    public function generarPdf(Request $request, $empresa, $tipo_reporte)
    { 
        $baterias = session('baterias_pdf');
        $plantas = session('plantas_pdf');
        $desde = session('desde_pdf');
        $hasta = session('hasta_pdf');

        $reporte = $tipo_reporte;

        $mediciones = $this->obtener_mediciones_nuevo($baterias, $plantas, $empresa, $desde, $hasta);

        $empresa = Empresa::where('id', $empresa)->get()->first();

        $hoy = Carbon::now();

        $hora = date("H:i", strtotime($hoy));

        $fecha = date("d/m/Y", strtotime($hoy));

        $mensaje = 'Este reporte fue emitido a las '.$hora.' el '.$fecha.' y toma en cuenta las mediciones realizadas a las baterias entre las fechas <b>'.date("d/m/Y", strtotime($desde)).'</b> y <b>'.date("d/m/Y", strtotime($hasta)).'</b>.';

        $pdf = PDF::loadView('reportes.pdf', compact('mediciones', 'empresa', 'reporte', 'mensaje'))->setPaper('a4', 'landscape');
        return $pdf->stream($reporte.'.pdf');
    }

    public function seleccionar($empresa)
    {
        $empresas = Empresa::find($empresa);
        
        $plantas = DB::table('planta')
        ->select('id', 'nombre')
        ->where('empresa_id', $empresa)
        ->get();

        $maquinaria = DB::table('maquinaria')
        ->select('id')
        ->where('planta_id', $plantas->pluck('id'))
        ->get()->pluck('id');

        $baterias = DB::table('bateria')
        ->select('id', 'numero_bateria')
        ->where('maquinaria_id', $maquinaria)
        ->get();

        $reportes = [
            'general' => 'Reporte general',
            'variables' => 'Reporte específico de variables',
            'mediciones' => 'Reporte de medición Online'
        ];
        return view('reportes.seleccionar', compact('plantas', 'baterias', 'empresa', 'empresas', 'reportes'));    
    }

    public function reportes_menu(Request $request, $empresa)
    {
        $baterias = $request->baterias;
        $plantas = $request->plantas;
        $desde = $request->desde;
        $hasta = $request->hasta;

        $tipo_reporte = $request->tipo_reporte;

        $request->session()->put('baterias_pdf', $baterias);
        $request->session()->put('plantas_pdf', $plantas);
        $request->session()->put('desde_pdf', $desde);
        $request->session()->put('hasta_pdf', $hasta);

        $mediciones = $this->obtener_mediciones_nuevo($baterias, $plantas, $empresa, $desde, $hasta);
        
        $bateria2 = Bateria::where('id', $baterias)->get()->first();

        $dispositivo_maestro = Bateria::where('id', $baterias)->select('dispositivo_id')->get()->first(); 
        $disp_maestro = DetalleDispositivo::where('dispositivo_id', $dispositivo_maestro->dispositivo_id)->get()->first(); 

        $empresa = Empresa::where('id', $empresa)->get()->first();

        $hoy = Carbon::now();

        $hora = date("H:i", strtotime($hoy));

        $fecha = date("d/m/Y", strtotime($hoy));

        $mensaje = 'Este reporte fue emitido a las '.$hora.' el '.$fecha.' y toma en cuenta las mediciones realizadas a las baterias entre las fechas <b>'.date("d/m/Y", strtotime($desde)).'</b> y <b>'.date("d/m/Y", strtotime($hasta)).'</b>.';

        return view('reportes.reporte_'.$tipo_reporte, compact('mediciones', 'empresa', 'tipo_reporte', 'mensaje', 'bateria2', 'disp_maestro'));
    }

    private function obtener_mediciones_nuevo($baterias_id, $plantas_form, $empresa, $desde, $hasta)
    {
        ini_set("memory_limit", "-1");
        
        $baterias_id = $baterias_id;

        $plantas_form = $plantas_form;

        if($baterias_id[0] != "all"){
            $baterias = Bateria::where('id', $baterias_id)->get();
        } else {
            if($plantas_form == 'all'){

                $plantas = DB::table('planta')
                ->select('planta.id', 'planta.nombre')
                ->where('empresa_id', $empresa)
                ->get()->pluck('id');
                
                $maquinaria = DB::table('maquinaria')
                ->select('id')
                ->where('planta_id', $plantas)
                ->get()->pluck('id');
            } else {
                $maquinaria = DB::table('maquinaria')
                ->select('id')
                ->where('planta_id', $plantas_form)
                ->get()->pluck('id');
            }
            $baterias = Bateria::where('maquinaria_id', $maquinaria)->get();
        }

        $mediciones = array();

        foreach ($baterias as $bateria) {
            $clave = $bateria->numero_bateria;

            $disp_maestro = DB::table('bateria')
            ->join('dispositivo', 'dispositivo.id', '=', 'bateria.dispositivo_id')
            ->select('dispositivo.*')
            ->where('bateria.id', $bateria->id)
            ->get()->first();

            if($disp_maestro){
                $mediciones_maestro = MonitoreoMedicion::where('maestro_id', $disp_maestro->id)
                ->whereDate('created_at', '>=', $desde)
                ->whereDate('created_at', '<=', $hasta)
                ->orderBy('id')->get();

                if(isset($mediciones_maestro)){
    
                    foreach ($mediciones_maestro as $medicion) {
    
                        $temperaturas = array_filter($medicion->toArray(), function($v, $k) {
                            return ($v != null && (strpos($k, 'temperatura') !== false));
                        }, ARRAY_FILTER_USE_BOTH);
    
                        $sum_temp = array_reduce($temperaturas, function($acum, $temp){
                            return $acum + $temp;
                        }, 0);
    
                        $cont = count($temperaturas);
                        
                        $medicion->temperaturaPromedio = $cont > 0 ? $sum_temp/$cont : null;
    
                        $medicion->alarma = Alarma::where('medicion_id', $medicion->id)->get()->first() ? true : false;
                    }

                    $medicion_bateria = [
                        'bateria' => $bateria,
                        'mediciones' => $mediciones_maestro
                    ];

                    $mediciones[] = $medicion_bateria;
                } 
            } 
        }
        return $mediciones;
    }

    public function obtener_mediciones_grafico($empresa)
    {
        $baterias = session('baterias_pdf');
        $plantas = session('plantas_pdf');
        $desde = session('desde_pdf');
        $hasta = session('hasta_pdf');

        $mediciones = $this->obtener_mediciones_nuevo($baterias, $plantas, $empresa, $desde, $hasta);

        return $mediciones;
    }
}