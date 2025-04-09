<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = "maquinaria";
    protected $fillable = ['codigo', 'siglas', 'planta_id', 'tipo_maquinaria_id','user_register'];
    protected $guarded = ['id'];

    public function planta()
    {
        return $this->belongsTo('App\Models\Procesos\Planta');
    }

    public function tipo_maquinaria()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoMaquinaria');
    }
    
    public function estado(){
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    public function baterias()
    {
        return $this->hasMany('App\Models\Procesos\Bateria');
    }
}