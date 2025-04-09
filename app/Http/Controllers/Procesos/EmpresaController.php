<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Empresa;
use App\Models\TablaSistema\TipoPasoSixmab;
use App\Models\Procesos\PasoSixmab;
use App\Models\TablaSistema\Pais;
use App\Http\Requests\EmpresaRequest;

use DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $privilege = \Auth::user()->privilege;
        $administrador = \Auth::user()->id;    
        
        if ($administrador == 1) {

            $empresa = Empresa::orderByDesc('estado')
            ->orderBy('siglas','ASC')
            ->paginate();
        } 
        else if ($privilege === 'true') {
            $empresa=DB::table('usuario_empresa')
            ->join('empresa','empresa.id','=','usuario_empresa.empresa_id')
            ->select('empresa.nombre','empresa.id','empresa.estado','empresa.siglas')
            ->where ('user_id',auth()->user()->id)
            ->orderBy('siglas','ASC')
            ->get();
        } else {
            $empresa=DB::table('usuario_empresa')
            ->join('empresa','empresa.id','=','usuario_empresa.empresa_id')
            ->select('empresa.nombre','empresa.id','empresa.estado','empresa.siglas')
            ->where ('user_id',auth()->user()->id)
            ->where('estado', 1)
            ->orderBy('siglas','ASC')
            ->get();
        }             
    	return view('procesos.empresa.index', compact('empresa'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_paso_sixmab = TipoPasoSixmab::orderBy('orden')->where('estado', 1)->get();
        $paises = Pais::all()->sortBy('nombre')->where('estado', 1);
        return view('procesos.empresa.crear', compact('tipos_paso_sixmab','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        $tipos_paso_sixmab = $request->tipos_paso_sixmab;
        $data = collect($request->all())->except(['tipos_paso_sixmab'])->toArray();
        $empresa = Empresa::create($data);

        if(isset($tipos_paso_sixmab)){
            foreach($tipos_paso_sixmab as $tipo){
                $paso_sixmab = new PasoSixmab(['tipo_paso_sixmab_id' => $tipo]);
                $empresa->pasos_sixmab()->save($paso_sixmab);
            }
        }

        if($empresa){
            return redirect('empresas')->with('mensaje', 'Empresa creada con éxito');
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
        $empresa = Empresa::find($id);
        $tipos_paso_sixmab = PasoSixmab::orderBy('tipo_paso_sixmab_id')->where('empresa_id',$id)->get();
        return view('procesos.empresa.mostrar', compact('empresa','tipos_paso_sixmab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $pasos_empresa = $empresa->pasos_sixmab;

        $paises = Pais::all()->sortBy('nombre')->where('estado', 1);
        $tipos_paso_sixmab = TipoPasoSixmab::orderBy('orden')->where('estado', 1)->get(); 
               
        return view('procesos.empresa.editar', ['data' => $empresa, 'tipos_paso_sixmab' => $tipos_paso_sixmab, 'pasos_empresa' => $pasos_empresa, 'paises' => $paises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::find($id);
        $tipos_paso_sixmab = $request->tipos_paso_sixmab;
        $pasos_empresa = $empresa->pasos_sixmab;
        $eliminados = $pasos_empresa->whereNotIn('tipo_paso_sixmab_id', $tipos_paso_sixmab);

        foreach($eliminados as $item){
            $item->delete();
        }
        
        if(isset($tipos_paso_sixmab)){
            foreach($tipos_paso_sixmab as $tipo){
                if($pasos_empresa->contains('tipo_paso_sixmab_id',$tipo) == false){
                    $paso_sixmab = new PasoSixmab(['tipo_paso_sixmab_id' => $tipo]);
                    $empresa->pasos_sixmab()->save($paso_sixmab);
                }
            }
        }

        $data = collect($request->all())->except(['_method', '_token', 'tipos_paso_sixmab'])->toArray();
        $empresa = Empresa::where('id', $id)->update($data);

        if($empresa){
            return redirect('empresas')->with('mensaje', 'Empresa actualizada con éxito');
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
            if (Empresa::destroy($id)) {
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
        $empresa = Empresa::find($id);
        $empresa->estado = false;
        $empresa->save();
        if($empresa){
            return response()->json($empresa);
        }
    }

    public function activate($id)
    {
        $empresa = Empresa::find($id);
        $empresa->estado = true;
        $empresa->save();
        if($empresa){
            return response()->json($empresa);
        }
    }
}