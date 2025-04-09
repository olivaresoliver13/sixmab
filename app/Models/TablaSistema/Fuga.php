<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

class Fuga extends Model
{
    protected $table = "fuga";
    protected $fillable = ['nombre','user_register'];
    protected $guarded =  ['id'];

    public function levantamiento()
    {
        return $this->hasMany('App\Models\PasosSixmab\Levantamiento');
    }
}