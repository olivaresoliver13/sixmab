<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class DanoFisico extends Model
{
    protected $table = "dano_fisico";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}