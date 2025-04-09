<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
    protected $table = "tipo_trabajo";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}