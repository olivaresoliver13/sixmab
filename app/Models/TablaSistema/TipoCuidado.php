<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class TipoCuidado extends Model
{
    protected $table = "tipo_cuidado";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}