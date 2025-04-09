<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function empresa()
    {
        return $this->hasMany('App\Models\Procesos\Empresa');
    }
    
    public function planta()
    {
        return $this->hasMany('App\Models\Procesos\Planta');
    }
}