<?php

namespace App\Http\Controllers\PasosSixmab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Bateria;
use App\Models\PasosSixmab\Diagnostico;
use App\Http\Requests\DiagnosticoRequest;

class DiagnosticoController extends Controller
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

        $diagnostico = Diagnostico::where('bateria_id', $id)->orderBy('created_at','desc')->get(); 

        return view('pasosixmab.diagnostico.index', compact('bateria', 'maquinaria','diagnostico'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\diagnostico
     */
    public function create($id)
    {
        $bateria = Bateria::find($id);
        return view('pasosixmab.diagnostico.crear', compact('bateria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosticoRequest $request, $bateria)
    {
        $request['user_register'] = Auth::user()->id;

        $datos = $request->all();
        $datos['bateria_id'] = $bateria; 
        $diagnostico = Diagnostico::create($datos);
 
        if($diagnostico){
            return redirect()->route('baterias.diagnostico.index', ['bateria' => $bateria])->with('mensaje', 'Diagnóstico creado con éxito');
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
        $data = Diagnostico::find($id);
        $bateria = $data->bateria;
        return view('pasosixmab.diagnostico.editar', compact('data','bateria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiagnosticoRequest $request, $id)
    {
        $data = collect($request->all())->except(['_method', '_token']);
        $diagnostico = Diagnostico::where('id', $id)->update($data->toArray());
        if($diagnostico){
            $bateria = Diagnostico::find($id)->bateria_id;
            return redirect()->route('baterias.diagnostico.index', ['bateria' => $bateria])->with('mensaje', 'Diagnóstico actualizado con éxito');
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
            if (Diagnostico::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}