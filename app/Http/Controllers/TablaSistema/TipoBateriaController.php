<?php

namespace App\Http\Controllers\TablaSistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TablaSistema\TipoBateria;
use App\Http\Requests\TipoBateriaRequest;

class TipoBateriaController extends Controller
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
            $tipo_bateria = TipoBateria::all();
        } else {
            $tipo_bateria = TipoBateria::all()->where('estado', 1);
        }  

        return view('tablasistema.tipo-bateria.index', compact('tipo_bateria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablasistema.tipo-bateria.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoBateriaRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        TipoBateria::create($request->all());
        return redirect('tipos_baterias')->with('mensaje','Tipo de batería creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_bateria = TipoBateria::find($id);
        return view('tablasistema.tipo-bateria.mostrar',compact('tipo_bateria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TipoBateria::findOrFail($id);
        return view('tablasistema.tipo-bateria.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoBateriaRequest $request, $id)
    {
        TipoBateria::findOrFail($id)->update($request->all());
        return redirect('tipos_baterias')->with('mensaje', 'Tipo de batería actualizada con éxito');
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
            if (TipoBateria::destroy($id)) {
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
        $data = TipoBateria::find($id);
        $data->estado = false;
        $data->save();
        if($data){
            return response()->json($data);
        }
    }

    public function activate($id)
    {
        $data = TipoBateria::find($id);
        $data->estado = true;
        $data->save();
        if($data){
            return response()->json($data);
        }
    }
}