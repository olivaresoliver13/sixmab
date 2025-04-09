<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = "planta";
    protected $fillable = ['nombre', 'siglas', 'identificador', 'telefono1', 'telefono2','email', 'direccion', 'empresa_id', 'pais_id','user_register'];
    protected $guarded = ['id'];

    public function empresa()
    {
        return $this->belongsTo('App\Models\Procesos\Empresa');
    }

    public function maquinarias()
    {
        return $this->hasMany('App\Models\Procesos\Maquinaria');
    }
    
    public function estado(){
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    public function pais()
    {
        return $this->belongsTo('App\Models\TablaSistema\Pais');
    }
}