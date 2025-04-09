<?php

namespace App\Http\Controllers\PasosSixmab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Bateria;
use App\Models\PasosSixmab\Regeneracion;
use App\Http\Requests\RegeneracionRequest;

class RegeneracionController extends Controller
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

        $regeneracion = Regeneracion::where('bateria_id', $id)->orderBy('created_at','desc')->get(); 

        return view('pasosixmab.regeneracion.index', compact('bateria', 'maquinaria','regeneracion'));
    }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bateria = Bateria::find($id);
        return view('pasosixmab.regeneracion.crear', compact('bateria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegeneracionRequest $request, $bateria)
    {
        $request['user_register'] = Auth::user()->id;

        $datos = $request->all();
        $datos['bateria_id'] = $bateria; 
        $regeneracion = Regeneracion::create($datos);
 
        if($regeneracion){
            return redirect()->route('baterias.regeneracion.index', ['bateria' => $bateria])->with('mensaje', 'Regeneración creado con éxito');
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
        $data = Regeneracion::find($id);
        $bateria = $data->bateria;
        return view('pasosixmab.regeneracion.editar', compact('data','bateria'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegeneracionRequest $request, $id)
    {
        $data = collect($request->all())->except(['_method', '_token']);
        $regeneracion = Regeneracion::where('id', $id)->update($data->toArray());
        if($regeneracion){
            $bateria = Regeneracion::find($id)->bateria_id;
            return redirect()->route('baterias.regeneracion.index', ['bateria' => $bateria])->with('mensaje', 'Regeneración actualizado con éxito');
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
            if (Regeneracion::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}