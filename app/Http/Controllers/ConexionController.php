<?php

namespace App\Http\Controllers;

use App\Repositories\Monitoreo;
use App\Models\Dispositivo\Dispositivo;
use App\Models\Procesos\Bateria;
use App\Models\PasosSixmab\MonitoreoMedicion;
use Illuminate\Http\Request;

use DB;

class ConexionController extends Controller
{
    protected $dispositivo;

    static $ultima_medicion;

    public function __construct(Monitoreo $dispositivo)
    {
        $this->dispositivo = $dispositivo;
    }

    public function captar_datos(Request $request, $dispositivo_id)
    {
        $dispositivo = $request->all();

        if( isset($dispositivo_id) ) 
        {
            $dispositivo_maestro = DB::table('dispositivo')
            ->join('detalle_dispositivo', 'detalle_dispositivo.dispositivo_id', '=', 'dispositivo.id')
            ->select('dispositivo.id', 'identificador', 'dispositivo.created_at', 'dispositivo.updated_at', 'voltaje_max', 'voltaje_min', 'corriente_min', 'corriente_max', 'temperatura_min', 'temperatura_max')
            ->where('dispositivo.identificador', $dispositivo_id)
            ->get()->first();

            if(isset($dispositivo_maestro))
            {
                $medicion = new MonitoreoMedicion();

                $medicion->maestro_id = $dispositivo_maestro->id;
                $medicion->bateria_id = Bateria::where('dispositivo_id', $dispositivo_maestro->id)->pluck('id')->implode('id');

                $medicion->corriente = $dispositivo['c'] ?? null;   
                $medicion->corriente1 = $dispositivo['c1'] ?? null;  
                $medicion->corriente2 = $dispositivo['c2'] ?? null;  
                $medicion->corriente3 = $dispositivo['c3'] ?? null;  
                $medicion->corriente4 = $dispositivo['c4'] ?? null;  
                $medicion->temperatura0 = $dispositivo['t0'] ?? null;        
                $medicion->temperatura1 = $dispositivo['t1'] ?? null;
                $medicion->temperatura2 = $dispositivo['t2'] ?? null;
                $medicion->temperatura3 = $dispositivo['t3'] ?? null;
                $medicion->temperatura4 = $dispositivo['t4'] ?? null;
                $medicion->temperatura5 = $dispositivo['t5'] ?? null;
                $medicion->temperatura6 = $dispositivo['t6'] ?? null;
                $medicion->temperatura7 = $dispositivo['t7'] ?? null;
                $medicion->temperatura8 = $dispositivo['t8'] ?? null;
                $medicion->temperatura9 = $dispositivo['t9'] ?? null;
                $medicion->voltaje0 = $dispositivo['v0'] ?? null;
                $medicion->voltaje1 = $dispositivo['v1'] ?? null;
                $medicion->voltaje2 = $dispositivo['v2'] ?? null;
                $medicion->voltaje3 = $dispositivo['v3'] ?? null;     
                $medicion->voltaje4 = $dispositivo['v4'] ?? null;
                $medicion->voltaje5 = $dispositivo['v5'] ?? null;
                $medicion->voltaje6 = $dispositivo['v6'] ?? null;
                $medicion->voltaje7 = $dispositivo['v7'] ?? null;  
                $medicion->voltaje8 = $dispositivo['v8'] ?? null;
                $medicion->voltaje9 = $dispositivo['v9'] ?? null;
                $medicion->voltaje10 = $dispositivo['v10'] ?? null;
                $medicion->voltaje11 = $dispositivo['v11'] ?? null;
                $medicion->voltaje12 = $dispositivo['v12'] ?? null;
                $medicion->voltaje13 = $dispositivo['v13'] ?? null;
                $medicion->voltaje14 = $dispositivo['v14'] ?? null;
                $medicion->voltaje15 = $dispositivo['v15'] ?? null;
                $medicion->voltaje16 = $dispositivo['v16'] ?? null;
                $medicion->voltaje17 = $dispositivo['v17'] ?? null;
                $medicion->voltaje18 = $dispositivo['v18'] ?? null;
                $medicion->voltaje19 = $dispositivo['v19'] ?? null;
                $medicion->voltaje20 = $dispositivo['v20'] ?? null;
                $medicion->voltaje21 = $dispositivo['v21'] ?? null;
                $medicion->voltaje22 = $dispositivo['v22'] ?? null;
                $medicion->voltaje23 = $dispositivo['v23'] ?? null;
                $medicion->voltaje24 = $dispositivo['v24'] ?? null;	
                $medicion->voltaje25 = $dispositivo['v25'] ?? null;	
                $medicion->voltaje26 = $dispositivo['v26'] ?? null;	
                $medicion->voltaje27 = $dispositivo['v27'] ?? null;	
                $medicion->voltaje28 = $dispositivo['v28'] ?? null;	
                $medicion->voltaje29 = $dispositivo['v29'] ?? null;	
                $medicion->voltaje30 = $dispositivo['v30'] ?? null;	
                $medicion->voltaje31 = $dispositivo['v31'] ?? null;	
                $medicion->voltaje32 = $dispositivo['v32'] ?? null;	
                $medicion->voltaje33 = $dispositivo['v33'] ?? null;	
                $medicion->voltaje34 = $dispositivo['v34'] ?? null;	
                $medicion->voltaje35 = $dispositivo['v35'] ?? null;	
                $medicion->voltaje36 = $dispositivo['v36'] ?? null;	
                $medicion->voltaje37 = $dispositivo['v37'] ?? null;	
                $medicion->voltaje38 = $dispositivo['v38'] ?? null;	
                $medicion->voltaje39 = $dispositivo['v39'] ?? null;	
                $medicion->voltaje40 = $dispositivo['v40'] ?? null;	
                $medicion->voltaje41 = $dispositivo['v41'] ?? null;	
                $medicion->voltaje42 = $dispositivo['v42'] ?? null;	
                $medicion->voltaje43 = $dispositivo['v43'] ?? null;	
                $medicion->voltaje44 = $dispositivo['v44'] ?? null;	
                $medicion->voltaje45 = $dispositivo['v45'] ?? null;	
                $medicion->voltaje46 = $dispositivo['v46'] ?? null;	
                $medicion->voltaje47 = $dispositivo['v47'] ?? null;				
                $medicion->save();		

	            $this->terminar_medicion($medicion, $dispositivo_maestro);			

                return 'Conexión Exitosa';
            }
            return 'Error en la Conexión';
        }
        return 'Error en la Conexión';
    }

    // private function obtener_medicion($disp_id, $var)
    // {
    //     //$last_medicion = $_SESSION['last_medicion'];
    //     $bateria = DB::table('bateria_dispositivo')
    //     ->select('bateria_id')
    //     ->where('dispositivo_id', $disp_id)
    //     ->get()->first()->bateria_id;

    //     $medicion =  Medicion::where('bateria_id', $bateria)->orderBy('id')->get()->last();

    //     if($medicion->$var != null){
    //         $medicion = new Medicion();
    
    //         $medicion->corriente = 0;
    //         $medicion->maestro_id = $disp_id;
    //         $medicion->bateria_id = $bateria;
    //     }

    //     return $medicion;
    // }

    private function terminar_medicion($medicion, $maestro)
    {
        $celdas = collect($medicion)->filter(function($value, $key){
            return strpos($key, 'voltaje') !== false && strpos($key, 'voltajeTotal') === false;
        });

        $voltajeTotal = $celdas->reduce(function($acum, $item){
            return $acum + $item;
        }, 0);

        $medicion->voltajeTotal = $voltajeTotal;
        
        if($medicion->save()){
            $medicion->verificar_medicion($maestro);
        }
    }

    private function conversion($valor){
        return (float) $valor;
    }
}