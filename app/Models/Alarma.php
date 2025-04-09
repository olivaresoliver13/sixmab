<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alarma extends Model
{
    protected $table = "alarmas";
    protected $fillable = [ 'medicion_id','dispositivo_id', 'usuario_solucion', 'solucionado'];
    protected $guarded = ['id'];
}
