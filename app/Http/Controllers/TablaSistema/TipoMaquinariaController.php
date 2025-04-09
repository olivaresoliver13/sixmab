<?php

namespace App\Http\Controllers\TablaSistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TablaSistema\TipoMaquinaria;
use App\Http\Requests\TipoMaquinariaRequest;

class TipoMaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {
        $privilege = \Auth::user()->privilege;

        if ($privilege === true) {
            $tipo_maquinaria = TipoMaquinaria::all();
        } else {
            $tipo_maquinaria = TipoMaquinaria::all()->where('estado', 1);
        }  

        return view('tablasistema.tipo-maquinaria.index', compact('tipo_maquinaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablasistema.tipo-maquinaria.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoMaquinariaRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        TipoMaquinaria::create($request->all());
        return redirect('tipos_maquinarias')->with('mensaje', 'Tipo de Maquinaria creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_maquinaria = TipoMaquinaria::find($id);
        return view('tablasistema.tipo-maquinaria.mostrar',compact('tipo_maquinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TipoMaquinaria::findOrFail($id);
        return view('tablasistema.tipo-maquinaria.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoMaquinariaRequest $request, $id)
    {
        TipoMaquinaria::findOrFail($id)->update($request->all());
        return redirect('tipos_maquinarias')->with('mensaje', 'Tipo de maquinaria actualizada con éxito');
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
            if (TipoMaquinaria::destroy($id)) {
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
        $tipo_maquinaria = TipoMaquinaria::find($id);
        $tipo_maquinaria->estado = false;
        $tipo_maquinaria->save();
        if($tipo_maquinaria){
            return response()->json($tipo_maquinaria);
        }
    }

    public function activate($id)
    {
        $tipo_maquinaria = TipoMaquinaria::find($id);
        $tipo_maquinaria->estado = true;
        $tipo_maquinaria->save();
        if($tipo_maquinaria){
            return response()->json($tipo_maquinaria);
        }
    }
}