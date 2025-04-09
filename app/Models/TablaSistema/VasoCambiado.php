<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class VasoCambiado extends Model
{
    protected $table = "vaso_cambiado";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}