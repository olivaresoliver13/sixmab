<?php

namespace App\Models\TablaSistema;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TipoPasoSixmab extends Model
{
    protected $table = "tipo_paso_sixmab";
    protected $fillable = ['nombre', 'descripcion', 'foto', 'orden','user_register'];
    protected $guarded = ['id'];

    public function paso_sixmab()
    {
        return $this->hasMany('App\Models\Procesos\paso_sixmab');
    }

    public static function setPasoSixmab($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("img/pasosixmab/$actual");
            }
            $imageName = Str::random(20) . '.png';
            $imagen = Image::make($foto)->encode('png', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img/pasosixmab/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}