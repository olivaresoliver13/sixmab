<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Empresa;
use App\Models\Procesos\Planta;
use App\Models\TablaSistema\Pais;
use App\Http\Requests\PlantaRequest;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $privilege = \Auth::user()->privilege;
        $empresa = Empresa::find($id);
        
        if ($privilege === true) {            
            $plantas = $empresa->plantas->sortBy('siglas')->sortByDesc('estado'); 
        } else {
            $plantas = $empresa->plantas->sortBy('siglas')->sortByDesc('estado')->where('estado', 1);   
        }
        return view('procesos.planta.index', compact('plantas', 'empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empresa = Empresa::find($id);
        $paises = Pais::all()->sortBy('nombre')->where('estado',1);
        return view('procesos.planta.crear', compact('empresa','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantaRequest $request, $empresa)
    {
        $request['user_register'] = Auth::user()->id;
        $datos = $request->all();
        $datos['empresa_id'] = $empresa; 
        $planta = Planta::create($datos);
        if($planta){
            return redirect()->route('empresas.plantas.index', ['empresa' => $empresa])->with('mensaje', 'Planta creada con éxito');
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
        $planta = Planta::find($id);
        return view('procesos.planta.mostrar', compact('planta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Planta::find($id);
        $paises = Pais::all()->sortBy('nombre')->where('estado',1);
        return view('procesos.planta.editar', compact('data','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantaRequest $request, $id)
    {
        $data = collect($request->all())->except(['_method', '_token']);
        $planta = Planta::where('id', $id)->update($data->toArray());
        if($planta){
            $empresa = Planta::find($id)->empresa_id;
            return redirect()->route('empresas.plantas.index', ['empresa' => $empresa])->with('mensaje', 'Planta actualizada con éxito');
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
            if (Planta::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function deactivate($id)
    {
        $planta = Planta::find($id);
        $planta->estado = false;
        $planta->save();
        if($planta){
            return response()->json($planta);
        }
    }

    public function activate($id)
    {
        $planta = Planta::find($id);
        $planta->estado = true;
        $planta->save();
        if($planta){
            return response()->json($planta);
        }
    }
}