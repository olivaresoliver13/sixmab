<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class DesbordamientoAcido extends Model
{
    protected $table = "desbordamiento_acido";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}