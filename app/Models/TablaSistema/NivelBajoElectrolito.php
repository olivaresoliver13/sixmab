<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class NivelBajoElectrolito extends Model
{
    protected $table = "nivel_bajo_electrolito";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}