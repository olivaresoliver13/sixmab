<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ['nombre', 'siglas', 'identificador', 'telefono1', 'telefono2', 'email', 'direccion', 'pais_id','user_register'];
    protected $guarded = ['id'];

    public function plantas()
    {
        return $this->hasMany('App\Models\Procesos\Planta');
    }

    public function pasos_sixmab()
    {
        return $this->hasMany('App\Models\Procesos\PasoSixmab');
    }
    
    public function estado(){
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    public function pais()
    {
        return $this->belongsTo('App\Models\TablaSistema\Pais');
    }
}