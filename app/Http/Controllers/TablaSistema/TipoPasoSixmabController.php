<?php

namespace App\Http\Controllers\TablaSistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TablaSistema\TipoPasoSixmab;
use App\Http\Requests\TipoPasoSixmabRequest;

class TipoPasoSixmabController extends Controller
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
            $tipo_pasosixmab = TipoPasoSixmab::all();
        } else {
            $tipo_pasosixmab = TipoPasoSixmab::all()->where('estado', 1);
        }  

        return view('tablasistema.tipo-pasosixmab.index', compact('tipo_pasosixmab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablasistema.tipo-pasosixmab.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPasoSixmabRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        if($foto = TipoPasoSixmab::setPasoSixmab($request->foto_up))
        $request->request->add(['foto'=>$foto]);
        TipoPasoSixmab::create($request->all());
        return redirect('tipos_pasosixmab')->with('mensaje', 'Tipo paso SIXMAB creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_pasosixmab = TipoPasoSixmab::find($id);
        return view('tablasistema.tipo-pasosixmab.mostrar',compact('tipo_pasosixmab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TipoPasoSixmab::findOrFail($id);
        return view('tablasistema.tipo-pasosixmab.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoPasoSixmabRequest $request, $id)
    {
        $pasosixmab = TipoPasoSixmab::findOrFail($id);
        if ($foto = TipoPasoSixmab::setPasoSixmab($request->foto_up, $pasosixmab->foto))
            $request->request->add(['foto' => $foto]);
            $pasosixmab->update($request->all());
            TipoPasoSixmab::findOrFail($id)->update($request->all());
        return redirect('tipos_pasosixmab')->with('mensaje', 'Tipo Paso SIXMAB actualizado con éxito');       
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
            if (TipoPasoSixmab::destroy($id)) {
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
        $tipo_pasosixmab = TipoPasoSixmab::find($id);
        $tipo_pasosixmab->estado = false;
        $tipo_pasosixmab->save();
        if($tipo_pasosixmab){
            return response()->json($tipo_pasosixmab);
        }
    }

    public function activate($id)
    {
        $tipo_pasosixmab = TipoPasoSixmab::find($id);
        $tipo_pasosixmab->estado = true;
        $tipo_pasosixmab->save();
        if($tipo_pasosixmab){
            return response()->json($tipo_pasosixmab);
        }
    }
}