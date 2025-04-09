<?php

namespace App\Models\PasosSixmab;

use Illuminate\Database\Eloquent\Model;

class Levantamiento extends Model
{
    protected $table = "levantamiento";
    protected $fillable = ['fecha_compra','fecha','nota','puente_defectuoso_oxidado','polo_levantado','oxidacion_fuerte','otro','tipo_trabajo_id','tipo_cuidado_id','vaso_cambiado_id','dano_fisico_id','fuga_id','desbordamiento_acido_id','nivel_bajo_electrolito_id','bateria_id','user_register'];
    protected $guarded = ['id'];

    public function tipo_trabajo()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoTrabajo');
    }    
    
    public function tipo_cuidado()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoCuidado');
    }

    public function vaso_cambiado()
    {
        return $this->belongsTo('App\Models\TablaSistema\VasoCambiado');
    }

    public function dano_fisico()
    {
        return $this->belongsTo('App\Models\TablaSistema\DanoFisico');
    }

    public function fuga()
    {
        return $this->belongsTo('App\Models\TablaSistema\Fuga');
    }

    public function desbordamiento_acido()
    {
        return $this->belongsTo('App\Models\TablaSistema\DesbordamientoAcido');
    }

    public function nivel_bajo_electrolito()
    {
        return $this->belongsTo('App\Models\TablaSistema\NivelBajoElectrolito');
    }

    public function bateria()
    {
        return $this->belongsTo('App\Models\Procesos\Bateria');
    }
        
    public function polo_levantado(){
        return $this->polo_levantado == 1 ? 'Positivo' : 'Negativo';
    }
        
    public function oxidacion_fuerte(){
        return $this->oxidacion_fuerte == 1 ? 'Si' : 'No';
    }
}