<?php

namespace App\Http\Controllers\PasosSixmab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use App\Models\Procesos\Planta;
use App\Models\Procesos\PasoSixmabBateria;
use App\Models\PasosSixmab\Levantamiento;
use App\Models\TablaSistema\TipoTrabajo;
use App\Models\TablaSistema\TipoCuidado;
use App\Models\TablaSistema\VasoCambiado;
use App\Models\TablaSistema\DanoFisico;
use App\Models\TablaSistema\Fuga;
use App\Models\TablaSistema\DesbordamientoAcido;
use App\Models\TablaSistema\NivelBajoElectrolito;
use App\Http\Requests\LevantamientoRequest;

class LevantamientoController extends Controller
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

        $levantamiento = $bateria->levantamiento;
        
        $boton = Levantamiento::where('bateria_id', $id)->get(); 

        return view('pasosixmab.levantamiento.index', compact('bateria', 'maquinaria','levantamiento','boton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tipotrabajo = TipoTrabajo::all()->sortBy('nombre')->where('estado', true);
        $tipocuidado = TipoCuidado::all()->sortBy('nombre')->where('estado', true);
        $vasocambiado = VasoCambiado::all()->where('estado', true);
        $danofisico = DanoFisico::all()->sortBy('nombre')->where('estado', true);
        $fuga = Fuga::all()->sortBy('nombre')->where('estado', true);
        $desbordamientoacido = DesbordamientoAcido::all()->sortBy('nombre')->where('estado', true);
        $nivelbajoelectrolito = NivelBajoElectrolito::all()->sortBy('nombre')->where('estado', true);

        $bateria = Bateria::find($id);
        return view('pasosixmab.levantamiento.crear', compact('bateria','tipotrabajo','tipocuidado','vasocambiado','danofisico','fuga','desbordamientoacido','nivelbajoelectrolito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevantamientoRequest $request, $bateria)
    {
        $request['user_register'] = Auth::user()->id;
        $datos = $request->all();
        $datos['bateria_id'] = $bateria; 
        $levantamiento = Levantamiento::create($datos);
 
        if($levantamiento){
            return redirect()->route('baterias.levantamiento.index', ['bateria' => $bateria])->with('mensaje', 'Levantamiento creado con éxito');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipotrabajo = TipoTrabajo::all()->sortBy('nombre')->where('estado', true);
        $tipocuidado = TipoCuidado::all()->sortBy('nombre')->where('estado', true);
        $vasocambiado = VasoCambiado::all()->where('estado', true);
        $danofisico = DanoFisico::all()->sortBy('nombre')->where('estado', true);
        $fuga = Fuga::all()->sortBy('nombre')->where('estado', true);
        $desbordamientoacido = DesbordamientoAcido::all()->sortBy('nombre')->where('estado', true);
        $nivelbajoelectrolito = NivelBajoElectrolito::all()->sortBy('nombre')->where('estado', true);

        $data = Levantamiento::find($id);
        return view('pasosixmab.levantamiento.editar', compact('data','tipotrabajo','tipocuidado','vasocambiado','danofisico','fuga','desbordamientoacido','nivelbajoelectrolito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LevantamientoRequest $request, $id)
    {
        $data = collect($request->all())->except(['_method', '_token']);
        $levantamiento = Levantamiento::where('id', $id)->update($data->toArray());
        if($levantamiento){
            $bateria = Levantamiento::find($id)->bateria_id;
            return redirect()->route('baterias.levantamiento.index', ['bateria' => $bateria])->with('mensaje', 'Levantamiento actualizado con éxito');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Levantamiento::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}