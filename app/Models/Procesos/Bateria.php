<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class Bateria extends Model
{
    protected $table = "bateria";
    protected $guarded = ['id'];
    protected $fillable = ['numero_bateria', 'siglas', 'maquinaria_id', 'tipo_bateria_id', 'composicion_quimica_id', 'cca_o_impedancia', 'marca_id', 'modelo_id', 'voltaje_nominal', 'numero_serie', 'capacidad_nominal', 'descarga_nominal', 'cantidad_celda', 'cantidad_temperatura', 'dispositivo_id','user_register'];
    
    public function maquinaria()
    {
        return $this->belongsTo('App\Models\Procesos\Maquinaria');
    }

    public function tipo_bateria()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoBateria');
    }

    public function composicion_quimica()
    {
        return $this->belongsTo('App\Models\TablaSistema\ComposicionQuimica');
    }
    
    public function estado(){
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    public function celdas()
    {
        return $this->hasMany('App\Models\Procesos\Celda');
    }

    public function pasosixmab_bateria()
    {
        return $this->hasMany('App\Models\Procesos\PasoSixmabBateria');
    }
    
    public function dispositivo()
    {
        return $this->belongsTo('App\Models\Dispositivo\Dispositivo');
    }

    public function levantamiento()
    {
        return $this->hasOne('App\Models\PasosSixmab\Levantamiento');
    }

    public function diagnostico()
    {
        return $this->hasMany('App\Models\Pasosixmab\Diagnostico');
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\TablaSistema\Marca');
    }
    
    public function modelo()
    {
        return $this->belongsTo('App\Models\TablaSistema\Modelo');
    }
}