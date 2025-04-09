<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Planta;
use App\Models\Procesos\Maquinaria;
use App\Models\TablaSistema\TipoMaquinaria;
use App\Http\Requests\MaquinariaRequest;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($planta)
    {
        $privilege = \Auth::user()->privilege;
        
        $planta = Planta::find($planta);

        if ($privilege === true) {            
            $maquinarias = $planta->maquinarias->sortBy('siglas')->sortByDesc('estado');
        } else {
            $maquinarias = $planta->maquinarias->sortBy('siglas')->sortByDesc('estado')->where('estado',1);
        }
        return view('procesos.maquinaria.index', compact('maquinarias', 'planta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($planta)
    {
        $planta = Planta::find($planta);
        $tipos_maquinaria = TipoMaquinaria::orderBy('nombre')->where('estado',1)->get();

        return view('procesos.maquinaria.crear', compact('planta', 'tipos_maquinaria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinariaRequest $request, $planta)
    {
        $request['user_register'] = Auth::user()->id;
        $datos = $request->all();
        $datos['planta_id'] = $planta; 
        $maquinaria = Maquinaria::create($datos);
        if($maquinaria){
            return redirect()->route('plantas.maquinarias.index', ['planta' => $planta])->with('mensaje', 'Maquinaria creada con éxito');
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
        $maquinaria = Maquinaria::find($id);
        return view('procesos.maquinaria.mostrar', compact('maquinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Maquinaria::find($id);
        $tipos_maquinaria = TipoMaquinaria::orderBy('nombre')->where('estado',1)->get();

        $plantas = $data->planta->empresa->plantas->sortBy('nombre')->where('estado',1); 
        return view('procesos.maquinaria.editar', compact('data', 'tipos_maquinaria', 'plantas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaquinariaRequest $request, $id)
    {
        $data = collect($request->all())->except(['_method', '_token']);
        $maquinaria = Maquinaria::where('id', $id)->update($data->toArray());
        if($maquinaria){
            $planta = Maquinaria::find($id)->planta_id;
            return redirect()->route('plantas.maquinarias.index', ['planta' => $planta])->with('mensaje', 'Maquinaria actualizada con éxito');
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
            if (Maquinaria::destroy($id)) {
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
        $maquinaria = Maquinaria::find($id);
        $maquinaria->estado = false;
        $maquinaria->save();
        if($maquinaria){
            return response()->json($maquinaria);
        }
    }

    public function activate($id)
    {
        $maquinaria = Maquinaria::find($id);
        $maquinaria->estado = true;
        $maquinaria->save();
        if($maquinaria){
            return response()->json($maquinaria);
        }
    }
}