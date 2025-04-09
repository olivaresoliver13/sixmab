<?php

namespace App\Http\Controllers\TablaSistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TablaSistema\ComposicionQuimica;
use App\Http\Requests\ComposicionQuimicaRequest;

class ComposicionQuimicaController extends Controller
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
            $composicion_quimica = ComposicionQuimica::all();
        } else {
            $composicion_quimica = ComposicionQuimica::all()->where('estado', 1);
        }  

        return view('tablasistema.composicion-quimica.index', compact('composicion_quimica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablasistema.composicion-quimica.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComposicionQuimicaRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        ComposicionQuimica::create($request->all());
        return redirect('composicion_quimica')->with('mensaje','Composición química creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $composicion_quimica = ComposicionQuimica::find($id);
        return view('tablasistema.composicion-quimica.mostrar',compact('composicion_quimica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ComposicionQuimica::findOrFail($id);
        return view('tablasistema.composicion-quimica.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComposicionQuimicaRequest $request, $id)
    {
        ComposicionQuimica::findOrFail($id)->update($request->all());
        return redirect('composicion_quimica')->with('mensaje', 'Composición química actualizada con éxito');
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
            if (ComposicionQuimica::destroy($id)) {
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
        $data = ComposicionQuimica::find($id);
        $data->estado = false;
        $data->save();
        if($data){
            return response()->json($data);
        }
    }

    public function activate($id)
    {
        $data = ComposicionQuimica::find($id);
        $data->estado = true;
        $data->save();
        if($data){
            return response()->json($data);
        }
    }
}