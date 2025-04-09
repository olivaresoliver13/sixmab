<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use App\Models\Procesos\PasoSixmab;
use App\Models\Procesos\PasoSixmabBateria;
use App\Models\Procesos\Planta;
use App\Models\TablaSistema\TipoBateria;
use App\Models\TablaSistema\TipoPasoSixmab;
use App\Models\TablaSistema\ComposicionQuimica;
use App\Models\TablaSistema\Marca;
use App\Models\TablaSistema\Modelo;
use App\Models\Dispositivo\Dispositivo;
use App\Models\PasosSixmab\MonitoreoMedicion;
use App\Http\Requests\BateriaRequest;
use DB;

class BateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($maquinaria)
    {
        $privilege = \Auth::user()->privilege;
        $maquinaria = Maquinaria::find($maquinaria);

        if ($privilege === true) {
            $baterias = $maquinaria->baterias->sortBy('siglas')->sortByDesc('estado'); 
        } else {
            $baterias = $maquinaria->baterias->sortBy('siglas')->sortByDesc('estado')->where('estado', 1);   
        }

        $tipos_paso_sixmab = TipoPasoSixmab::all()->sortBy('orden');

        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;
        return view('procesos.bateria.index', compact('baterias', 'maquinaria', 'tipos_paso_sixmab'));
    }

    public function plantas($planta)
    {
        $privilege = \Auth::user()->privilege;
        $planta = Planta::find($planta);
        $maquinarias = $planta->maquinarias;

        $tipos_paso_sixmab = TipoPasoSixmab::all()->sortBy('orden');

        if ($privilege === true) {
            $baterias = Bateria::whereIn('maquinaria_id', $maquinarias->pluck('id'))->orderByDesc('estado')->orderBy('siglas','ASC')->get();
        } else {
            $baterias = Bateria::whereIn('maquinaria_id', $maquinarias->pluck('id'))->orderByDesc('estado')->orderBy('siglas','ASC')->where('estado', 1)->get();
        }
        return view('procesos.bateria.index', compact('baterias', 'planta','tipos_paso_sixmab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($maquinaria)
    {   
        $tipos_bateria = TipoBateria::all()->sortBy('nombre')->where('estado',1);
        $composicion_quimica = ComposicionQuimica::all()->sortByDesc('nombre')->where('estado',1);
        $marca = Marca::all()->sortByDesc('nombre')->where('estado',1);
        $modelo = Modelo::all()->sortByDesc('nombre')->where('estado',1);

        $dispositivo =  DB::table('dispositivo')->where('tipo_dispositivo',1)->where('estado',1)->whereNotExists(function ($query) {
            $query->select("id")->from('bateria')->whereRaw('bateria.dispositivo_id = dispositivo.id');
        })->get();

        $maquinaria = Maquinaria::find($maquinaria);
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa->id;
        $tipos_paso_sixmab = PasoSixmab::all()->sortBy('tipo_paso_sixmab_id')->where('empresa_id',$empresa);

        return view('procesos.bateria.crear', compact('maquinaria', 'tipos_bateria', 'composicion_quimica','tipos_paso_sixmab','dispositivo','marca','modelo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BateriaRequest $request, $maquinaria)
    {
        $request['user_register'] = Auth::user()->id;
        $datos = $request->all();
        $datos['maquinaria_id'] = $maquinaria; 
        $bateria = Bateria::create($datos);

        $tipos_paso_sixmab = $request->tipos_paso_sixmab;
        $datos = collect($request->all())->except(['tipos_paso_sixmab'])->toArray();
  
        if(isset($tipos_paso_sixmab)){
            foreach($tipos_paso_sixmab as $tipo){
                $paso_sixmab = new PasoSixmabBateria(['tipo_paso_sixmab_id' => $tipo]);
                $bateria->pasosixmab_bateria()->save($paso_sixmab);
            }
        }
    
        if($bateria){
            return redirect()->route('maquinarias.baterias.index', ['maquinaria' => $maquinaria])->with('mensaje', 'Batería creada con éxito');
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
        $bateria = Bateria::find($id);
        $tipos_paso_sixmab = PasoSixmabBateria::orderBy('tipo_paso_sixmab_id')->where('bateria_id',$id)->get();
        return view('procesos.bateria.mostrar', compact('bateria','tipos_paso_sixmab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bateria::find($id);

        $pasos_empresa = $data->pasosixmab_bateria;
        
        $tipos_bateria = TipoBateria::all()->sortBy('nombre')->where('estado',1);
        $composicion_quimica = ComposicionQuimica::all()->sortByDesc('nombre')->where('estado',1);
        $marca = Marca::all()->sortByDesc('nombre')->where('estado',1);
        $modelo = Modelo::all()->sortByDesc('nombre')->where('estado',1);

        $dispositivo = Dispositivo::all()->sortBy('identificador')->where('tipo_dispositivo',1)->where('estado',1);

        $plantas = $data->maquinaria->planta->empresa->plantas;

        $paso_sixmab = $data->maquinaria->planta->empresa->id;        
        $tipos_paso_sixmab = PasoSixmab::all()->sortBy('tipo_paso_sixmab_id')->where('empresa_id',$paso_sixmab);
        
        return view('procesos.bateria.editar', compact('data', 'tipos_bateria', 'composicion_quimica', 'plantas','tipos_paso_sixmab','pasos_empresa','dispositivo','marca','modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BateriaRequest $request, $id)
    {
        $bateria1 = Bateria::find($id);              
        $tipos_paso_sixmab = $request->tipos_paso_sixmab;        
        $pasos_empresa = $bateria1->pasosixmab_bateria;        
        $eliminados = $pasos_empresa->whereNotIn('tipo_paso_sixmab_id', $tipos_paso_sixmab);
      
        foreach($eliminados as $item){
            $item->delete();
        }

        if(isset($tipos_paso_sixmab)){
            foreach($tipos_paso_sixmab as $tipo){
                if($pasos_empresa->contains('tipo_paso_sixmab_id',$tipo) == false){
                    $paso_sixmab = new PasoSixmabBateria(['tipo_paso_sixmab_id' => $tipo]);
                    $bateria1->pasosixmab_bateria()->save($paso_sixmab);
                }
            }
        }

        $data = collect($request->all())->except(['_method', '_token', 'tipos_paso_sixmab'])->toArray();
        $bateria = Bateria::where('id', $id)->update($data);
       
        if($bateria){
            $maquinaria = Bateria::find($id)->maquinaria_id;
            return redirect()->route('maquinarias.baterias.index', ['maquinaria' => $maquinaria])->with('mensaje', 'Batería actualizada con éxito');
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
            if (Bateria::destroy($id)) {
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
        $bateria = Bateria::find($id);
        $bateria->estado = false;
        $bateria->save();
        if($bateria){
            return response()->json($bateria);
        }
    }

    public function activate($id)
    {
        $bateria = Bateria::find($id);
        $bateria->estado = true;
        $bateria->save();
        if($bateria){
            return response()->json($bateria);
        }
    }
}