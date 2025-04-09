<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class TipoBateria extends Model
{
    protected $table = "tipo_bateria";
    protected $fillable = ['nombre','user_register'];
    protected $guarded = ['id'];

    public function baterias()
    {
        return $this->hasMany('App\Models\Procesos\Bateria');
    }
}