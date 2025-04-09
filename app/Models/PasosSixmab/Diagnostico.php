<?php

namespace App\Models\PasosSixmab;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = "diagnostico";
    protected $fillable = ['gravedad_especifica','voltaje','temperatura','corriente_ac_dc','hora','corriente','voltaje_corte','tiempo_descarga','capacidad','eficiencia','impedancia','cca_cold_cranking_ampere','bateria_id','user_register'];
    protected $guarded = ['id'];

    public function bateria()
    {
        return $this->belongsTo('App\Models\Procesos\Bateria');
    }
}