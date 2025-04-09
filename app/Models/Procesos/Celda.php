<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class Celda extends Model
{
    protected $table = "celdas";
    protected $fillable = ['numero_celda', 'dispositivo_id', 'bateria_id'];
    protected $guarded = ['id'];

    public function bateria()
    {
        return $this->belongsTo('App\Models\Procesos\Bateria');
    }

    public function dispositivo()
    {
        return $this->belongsTo('App\Models\Dispositivo\Dispositivo');
    }
}