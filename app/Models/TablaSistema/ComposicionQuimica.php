<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class ComposicionQuimica extends Model
{
    protected $table = "composicion_quimica";
    protected $fillable = ['nombre','user_register'];
    protected $guarded = ['id'];

    public function baterias()
    {
        return $this->hasMany('App\Models\Procesos\Bateria');
    }
}