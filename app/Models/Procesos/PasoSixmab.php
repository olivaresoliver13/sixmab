<?php

namespace App\Models\Procesos;

use Illuminate\Database\Eloquent\Model;

class PasoSixmab extends Model
{
    protected $table = "paso_sixmab";
    protected $fillable = ['empresa_id', 'tipo_paso_sixmab_id'];
    protected $guarded = ['id'];

    public function tipo_paso_sixmab()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoPasoSixmab');
    }

    public function empresa(){
        return $this->belongsTo('App\Models\Procesos\Empresa');
    }

    public function tipo_maquinaria()
    {
        return $this->belongsTo('App\Models\TablaSistema\TipoPasoSixmab');
    }
}