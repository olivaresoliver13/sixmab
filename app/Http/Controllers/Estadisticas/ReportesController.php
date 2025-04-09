<?php

namespace App\Http\Controllers\Estadisticas;

use App\Http\Controllers\Controller;
use App\Models\Procesos\Empresa;
use App\Models\Procesos\Planta;
use App\Models\Procesos\Maquinaria;
use App\Models\Procesos\Bateria;
use App\Models\PasosSixmab\MonitoreoMedicion;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitoreo()
    {
        $mediciones = MonitoreoMedicion::latest()->take(100)->get();
        return view('estadisticas.reportes.monitoreo.index', compact('mediciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empresa()
    {
        $empresas = Empresa::all();
        return view('estadisticas.reportes.empresa.index', compact('empresas'));
    }

    public function empresa_pdfindividual($id)
    {
        $empresa = Empresa::find($id);
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.empresa.pdfindividual', compact('empresa','fecha'));
    	return $pdf->download('empresa.pdf');
    }

    public function empresa_pdfgeneral()
    {
        $empresas = Empresa::all();
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.empresa.pdfgeneral', compact('empresas','fecha'));
    	return $pdf->setPaper('a4','landscape')->download('empresas.pdf');
    }

    public function planta()
    {
        $plantas = Planta::all();
        return view('estadisticas.reportes.planta.index', compact('plantas'));
    }

    public function planta_pdfindividual($id)
    {
        $planta = Planta::find($id);
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.planta.pdfindividual', compact('planta','fecha'));
    	return $pdf->download('planta.pdf');
    }

    public function planta_pdfgeneral()
    {
        $plantas = Planta::all();
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.planta.pdfgeneral', compact('plantas','fecha'));
    	return $pdf->setPaper('a4','landscape')->download('plantas.pdf');
    }

    public function maquinaria()
    {
        $maquinarias = Maquinaria::all();
        return view('estadisticas.reportes.maquinaria.index', compact('maquinarias'));
    }

    
    public function maquinaria_pdfindividual($id)
    {
        $maquinaria = Maquinaria::find($id);
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.maquinaria.pdfindividual', compact('maquinaria','fecha'));
    	return $pdf->download('maquinaria.pdf');
    }

    public function maquinaria_pdfgeneral()
    {
        $maquinarias = Maquinaria::all();
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.maquinaria.pdfgeneral', compact('maquinarias','fecha'));
    	return $pdf->setPaper('a4','landscape')->download('maquinarias.pdf');
    }

    public function bateria()
    {
        $baterias = Bateria::all();
        return view('estadisticas.reportes.bateria.index', compact('baterias'));
    }

    public function bateria_pdfindividual($id)
    {
        $bateria = Bateria::find($id);
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.bateria.pdfindividual', compact('bateria','fecha'));
    	return $pdf->download('bateria.pdf');
    }

    public function bateria_pdfgeneral()
    {
        $baterias = Bateria::all();
        $fecha = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('estadisticas.reportes.bateria.pdfgeneral', compact('baterias','fecha'));
    	return $pdf->setPaper('a4','landscape')->download('baterias.pdf');
    }
}
