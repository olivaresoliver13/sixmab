<?php

namespace App\Http\Controllers\Dispositivo;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo\Dispositivo;
use App\Models\Dispositivo\DetalleDispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DispositivoRequest;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivo::where('tipo_dispositivo', 1)->get();
        return view('dispositivo.index', compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maestros = Dispositivo::where('tipo_dispositivo', 1)->get();

        $tipos = [
            ['nombre' => 'Maestro', 'val' => 1],
            ['nombre' => 'Esclavo', 'val' => 2]
        ];

        return view('dispositivo.crear', compact('maestros', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DispositivoRequest $request)
    {
        $dispositivo = new Dispositivo();
        $dispositivo->identificador = $request->identificador;
        $dispositivo->tipo_dispositivo = $request->tipo_dispositivo;

        if($dispositivo->tipo_dispositivo == 2) {
            $dispositivo->maestro_id = $request->maestro_id;
        }
        $request['user_register'] = Auth::user()->id;
        $dispositivo = $request->all();

        $dispositivo = Dispositivo::create($dispositivo);

        if($dispositivo->tipo_dispositivo == 1){
            $detalle = new DetalleDispositivo();
            $detalle->voltaje_min = $request->voltaje_min;
            $detalle->voltaje_max = $request->voltaje_max;
            $detalle->corriente_min = $request->corriente_min;
            $detalle->corriente_max = $request->corriente_max;
            $detalle->temperatura_min = $request->temperatura_min;
            $detalle->temperatura_max = $request->temperatura_max;

            $detalle->dispositivo_id = $dispositivo->id;
            $detalle->save();
        } 

        if($dispositivo){
            return redirect('dispositivos')->with('mensaje', 'Dispositivo creado con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivo = Dispositivo::find($id);
        $detalle = $dispositivo->detalle_dispositivo;
        return view('dispositivo.mostrar', compact('dispositivo','detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispositivo = Dispositivo::find($id);

        $detalle = $dispositivo->detalle_dispositivo;

        $maestros = Dispositivo::where('tipo_dispositivo', 1)->get();

        $tipos = [
            ['nombre' => 'Maestro', 'val' => 1],
            ['nombre' => 'Esclavo', 'val' => 2]
        ];

        return view('dispositivo.editar', ['data' => $dispositivo, 'maestros' => $maestros, 'tipos' => $tipos, 'detalle' => $detalle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DispositivoRequest $request, $id)
    {
        $dispositivo = Dispositivo::find($id);

        $dispositivo->identificador = $request->identificador;

        if($dispositivo->tipo_dispositivo == 2) {
            $dispositivo->maestro_id = $request->maestro_id;
        }
            
        $dispositivo->save();

        if($dispositivo->tipo_dispositivo == 1){
            $detalle = $dispositivo->detalle_dispositivo;
            $detalle->voltaje_min = $request->voltaje_min;
            $detalle->voltaje_max = $request->voltaje_max;
            $detalle->corriente_min = $request->corriente_min;
            $detalle->corriente_max = $request->corriente_max;
            $detalle->temperatura_min = $request->temperatura_min;
            $detalle->temperatura_max = $request->temperatura_max;

            $detalle->dispositivo_id = $dispositivo->id;
            $detalle->save();
        } 
        if($dispositivo){
            return redirect('dispositivos')->with('mensaje', 'Dispositivo actualizado con éxito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispositivo = Dispositivo::find($id);

        if(count($dispositivo->esclavos) > 0){
            $rs = false;
            $titulo = 'Error!';
            $mensaje = 'No puede eliminar este dispositivo porque tiene esclavos';
            $tipo = 'error';
        } else {
            $tipo = 'success';
            $titulo = 'Eliminado!';
            $mensaje = 'Este dispositivo fue eliminado.';
            if($dispositivo->tipo_dispositivo == 1){
                $dispositivo->detalle_dispositivo->delete();
            }
            $rs = $dispositivo->delete();
        }
        
        return response()->json(compact('rs', 'titulo', 'mensaje', 'tipo'));
    }

    public function deactivate($id)
    {
        $dispositivo = Dispositivo::find($id);
        $dispositivo->estado = false;
        $dispositivo->save();
        if($dispositivo){
            return response()->json($dispositivo);
        }
    }

    public function activate($id)
    {
        $dispositivo = Dispositivo::find($id);
        $dispositivo->estado = true;
        $dispositivo->save();
        if($dispositivo){
            return response()->json($dispositivo);
        }
    }
}