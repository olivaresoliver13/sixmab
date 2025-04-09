<?php

namespace App\Models\PasosSixmab;

use App\Models\Alarma;
use App\Models\Procesos\Bateria;
use App\Models\Dispositivo\Dispositivo;
use App\User;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

use DB;

class MonitoreoMedicion extends Model
{
    protected $table = "medicion";
    protected $guarded = ['id'];
    protected $fillable = [
        'corriente',
        'corriente1',
        'corriente2',
        'corriente3',
        'corriente4',
        'temperatura0',
        'temperatura1',
        'temperatura2',
        'temperatura3',
        'temperatura4',
        'temperatura5',
        'temperatura6',
        'temperatura7',
        'temperatura8',
        'temperatura9',
        'voltajeTotal',
        'voltaje0',
        'voltaje1',
        'voltaje2',
        'voltaje3',
        'voltaje4',
        'voltaje5',
        'voltaje6',
        'voltaje7',
        'voltaje8',
        'voltaje9',
        'voltaje10',
        'voltaje11',
        'voltaje12',
        'voltaje13',
        'voltaje14',
        'voltaje15',
        'voltaje16',
        'voltaje17',
        'voltaje18',
        'voltaje19',
        'voltaje20',
        'voltaje21',
        'voltaje22',
        'voltaje23',
        'voltaje24',
        'voltaje25',
        'voltaje26',
        'voltaje27',
        'voltaje28',
        'voltaje29',
        'voltaje30',
        'voltaje31',
        'voltaje32',
        'voltaje33',
        'voltaje34',
        'voltaje35',
        'voltaje36',
        'voltaje37',
        'voltaje38',
        'voltaje39',
        'voltaje40',
        'voltaje41',
        'voltaje42',
        'voltaje43',
        'voltaje44',
        'voltaje45',
        'voltaje46',
        'voltaje47',
        'maestro_id',
        'bateria_id'
    ];

    public $temperaturaPromedio;
    public $alarma;

    public $limites_temperatura;
    public $limites_voltaje;
    public $limites_corriente;
    public $limites_voltajeTotal;

    public $temperaturas_anomalos;
    public $voltajes_anomalos;
    public $corriente_anomalos;

    public function verificar_medicion($dispositivo)
    {
        if ($this->verificar_alarma(2)) {     
            $this->establecer_limites($dispositivo);
    
            $temperaturas = array_filter($this->toArray(), function($value, $key)
            {
                return strpos($key, 'temperatura') !== false;
            }, ARRAY_FILTER_USE_BOTH);

            $celdas = array_filter($this->toArray(), function($value, $key)
            {
                return strpos($key, 'voltaje') !== false && strpos($key, 'voltajeTotal') === false;
            }, ARRAY_FILTER_USE_BOTH);
    
            //Temperaturas anomalas
            $this->temperaturas_anomalos = $this->obtener_anomalos($temperaturas, $this->limites_temperatura);
            //Celdas anomalas 
            $this->voltajes_anomalos = $this->obtener_anomalos($celdas, $this->limites_voltaje);
            //Corrientes anomalas
            $this->corriente_anomalos = $this->obtener_anomalos([$this->corriente], $this->limites_corriente);

            if($this->verificar_anomalos())
            {
                $mensaje = $this->estructura_mensaje_celdas();
                
                $data = $this->obtener_usuarios();  
            
                $alarma = new Alarma();
                $alarma->medicion_id = $this->id;
                $alarma->dispositivo_id = $this->maestro_id;
                $alarma->save();

                Notification::send($data['usuarios'], new InvoicePaid($this, $mensaje, $data['bateria'], $alarma->id));  
            }
        }
    }

    public function detalle_medicion()
    {
        $dispositivo = DB::table('dispositivo')
        ->join('detalle_dispositivo', 'detalle_dispositivo.dispositivo_id', '=', 'dispositivo.id')
        ->select('dispositivo.id', 'identificador', 'dispositivo.created_at', 'dispositivo.updated_at', 'voltaje_max', 'voltaje_min', 'corriente_min', 'corriente_max', 'temperatura_min', 'temperatura_max')
        ->where('dispositivo.id', $this->maestro_id)
        ->get()->first();

        $this->establecer_limites($dispositivo);

        $temperaturas = array_filter($this->toArray(), function($value, $key){
            return strpos($key, 'temperatura') !== false;
        }, ARRAY_FILTER_USE_BOTH);

        $celdas = array_filter($this->toArray(), function($value, $key){
            return strpos($key, 'voltaje') !== false && strpos($key, 'voltajeTotal') === false;
        }, ARRAY_FILTER_USE_BOTH);

        //Temperaturas anomalas
        $this->temperaturas_anomalos = $this->obtener_anomalos_detalle($temperaturas, $this->limites_temperatura);
        //Celdas anomalas 
        $this->voltajes_anomalos = $this->obtener_anomalos_detalle($celdas, $this->limites_voltaje);
    }

    private function establecer_limites($dispositivo)
    {
        $cantidad_celdas = Bateria::where('dispositivo_id', $dispositivo->id)->pluck('cantidad_celda')->implode('cantidad_celda');

        $this->limites_temperatura = ['max' => $dispositivo->temperatura_max, 'min' => $dispositivo->temperatura_min];
        $this->limites_voltaje = ['max' => $dispositivo->voltaje_max, 'min' => $dispositivo->voltaje_min];
        $this->limites_corriente = ['max' => $dispositivo->corriente_max, 'min' => $dispositivo->corriente_min];
        $this->limites_voltajeTotal = ['max' => $dispositivo->voltaje_max * $cantidad_celdas, 'min' => $dispositivo->voltaje_min * $cantidad_celdas];
    }

    private function obtener_anomalos_detalle($vector, $limites)
    {
        $sup = array_filter($vector, function($v, $k) use ($limites) 
        {
            return $v > $limites['max'];
        }, ARRAY_FILTER_USE_BOTH);

        $inf = array_filter($vector, function($v, $k) use ($limites) 
        {
            return $v < $limites['min'] && $v != null;
        }, ARRAY_FILTER_USE_BOTH);

        return compact('sup', 'inf');
    }

    private function obtener_anomalos($vector, $limites)
    {
        $anomalos = array_filter($vector, function($v, $k) use ($limites) 
        {
            return $v > $limites['max'] || ($v < $limites['min'] && $v != null);
        }, ARRAY_FILTER_USE_BOTH);

        return $anomalos;
    }

    private function verificar_anomalos()
    {
        $alarma = ['temperatura' => false, 'voltaje' => false, 'corriente' => false, 'voltajeTotal' => false];
    
        if(count($this->temperaturas_anomalos) > 0) {
            $alarma['temperatura'] = true;
        }
        if(count($this->voltajes_anomalos) > 0) {
            $alarma['voltaje'] = true;
        }
        if(count($this->corriente_anomalos) > 0) {
            $alarma['corriente'] = true;
        }
        if($this->voltajeTotal > $this->limites_voltajeTotal['max'] || $this->voltajeTotal < $this->limites_voltajeTotal['min']) {
            $alarma['voltajeTotal'] = true;
        }

        if($alarma['temperatura'] || $alarma['voltaje'] || $alarma['corriente'] || $alarma['voltajeTotal']) {
            return true;
        }
        return false;
    }

    public function estructura_mensaje_celdas()
    {
        $cont_voltajes = count($this->voltajes_anomalos);

        if($cont_voltajes == 1) {
            $mensaje = 'en la celda ';
        } else {
            $mensaje = 'en las celdas ';
        }

        $i = 0;

        foreach ($this->voltajes_anomalos as $key => $value) 
        {
            $variable = (int) str_replace('voltaje', '', $key) + 1;
            if($i == 0) {
                $mensaje .= $variable;
            } elseif($i == $cont_voltajes - 1) {
                $mensaje .= ' y '.$variable;
            } else {
                $mensaje .= ', '.$variable;
            }
            $i++;
        }

        return $mensaje;
    }

    private function obtener_usuarios(){  

        $bateria = Bateria::all()->where('dispositivo_id', $this->maestro_id)->last();
        $maquinaria = $bateria->maquinaria;
        $planta = $maquinaria->planta;
        $empresa = $planta->empresa;

        $user = DB::table('usuario_empresa')
        ->join('users', 'users.id', '=', 'usuario_empresa.user_id')
        ->select('users.*')
        ->where('usuario_empresa.empresa_id', $empresa->id)
        ->get()->pluck('id');
        
        $usuarios = User::whereIn('id', $user)->get();  

        return compact('usuarios', 'empresa', 'bateria');
    }

    private function verificar_alarma($minutos){
        $alarma = Alarma::all()->where('dispositivo_id', $this->maestro_id)->last();

        if($alarma){
            $date = $alarma->created_at;

            $fecha = Carbon::parse($date)->addMinutes($minutos);
            $ahora = Carbon::now();

            return $fecha->lt($ahora);
        }
        return true;
    }

    public function temperatura_celdas($temp)
    {
        $num = (int) str_replace("temperatura", '',$temp);

        $celdas = '';
    }
}