<?php

namespace App\Models\Dispositivo;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = "dispositivo";
    protected $fillable = ['identificador','tipo_dispositivo','maestro_id','user_register'];
    protected $guarded = ['id'];

    public function celda()
    {
        return $this->hasMany('App\Models\Dispositivo\Celda');
    }

    public function maestro()
    {
        return $this->belongsTo('App\Models\Dispositivo\Dispositivo');
    }

    public function esclavos()
    {
        return $this->hasMany('App\Models\Dispositivo\Dispositivo', 'maestro_id', 'id');
    }

    public function tipo(){
        return $this->tipo_dispositivo == 1 ? 'Maestro' : 'Esclavo';
    }

    public function estado(){
        return $this->estado == 1 ? 'Activo' : 'Inactivo';
    }

    public function detalle_dispositivo()
    {
        return $this->hasOne('App\Models\Dispositivo\DetalleDispositivo');
    }

    public function baterias()
    {
        return $this->hasMany('App\Models\Procesos\Bateria');
    }
}