<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Procesos\Bateria;
use App\Models\Procesos\Maquinaria;
use App\Models\Procesos\Planta;
use App\Models\Procesos\PasoSixmabBateria;

class PasoSixmabController extends Controller
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
        
        $pasosixmab = PasoSixmabBateria::all()
        ->where('bateria_id',$id)->sortBy('tipo_paso_sixmab_id');
        return view('procesos.pasos-sixmab.index', compact('bateria', 'maquinaria','pasosixmab'));
    }

    public function redirect($id)
    {
        $id_bateria=$_GET['idb'];
   
        if ($id == 1){
            return redirect()->route('baterias.levantamiento.index', [$id_bateria]);
        }
        elseif($id == 2){
            return redirect()->route('baterias.diagnostico.index', [$id_bateria]);
        }
        elseif($id == 3){
            return redirect()->route('baterias.pasosixmab.index', [$id_bateria]);
        }
        elseif($id == 4){
            return redirect()->route('baterias.regeneracion.index', [$id_bateria]);
        }
        elseif($id == 5){
            return redirect()->route('monitoreo.index', [$id_bateria]);
        }
        elseif($id == 6){
            return redirect()->route('baterias.pasosixmab.index', [$id_bateria]);
        }
    }      
}