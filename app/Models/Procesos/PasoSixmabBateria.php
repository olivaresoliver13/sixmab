<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class PasoSixmabBateria extends Model
{
    protected $table = "pasosixmab_bateria";
    protected $fillable = ['bateria_id', 'tipo_paso_sixmab_id'];
    protected $guarded = ['id'];

    public function tipo_paso_sixmab()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoPasoSixmab');
    }

    public function bateria(){
        return $this->belongsTo('App\Models\Procesos\Bateria');
    }
}