<?php

namespace App\Models\Dispositivo;

use Illuminate\Database\Eloquent\Model;

class DetalleDispositivo extends Model
{
    protected $table = "detalle_dispositivo";
    protected $fillable = ['voltaje_max','voltaje_min','corriente_max','corriente_min','temperatura_max','temperatura_min','dispositivo_id'];
    protected $guarded = ['id'];

    public function maestro()
    {
        return $this->belongsTo('App\Models\Dispositivo\Dispositivo');
    }
}