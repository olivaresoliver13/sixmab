<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class TipoMaquinaria extends Model
{
    protected $table = "tipo_maquinaria";
    protected $fillable = ['nombre', 'icono','user_register'];
    protected $guarded = ['id'];

    public function maquinarias()
    {
        return $this->hasMany('App\Models\Procesos\Maquinaria');
    }
}