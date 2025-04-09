<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = "modelo";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function bateria()
    {
        return $this->hasMany('App\Models\Procesos\Bateria');
    }
}