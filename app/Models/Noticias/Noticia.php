<?php

namespace App\Models\Noticias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Noticia extends Model
{
    protected $table = "noticia";
    protected $fillable = ['titulo','entradilla','texto1','texto2','texto3','texto4','texto5','autor','link','foto','user_register'];
    protected $guarded = ['id'];

    public static function setNoticia($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("img/noticia/$actual");
            }
            $imageName = Str::random(20) . '.png';
            $imagen = Image::make($foto)->encode('png', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img/noticia/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}