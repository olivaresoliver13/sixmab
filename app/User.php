<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Support\Facades\Session;
use App\Models\Procesos\Empresa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = [
        'updated_at',
        'created_at',
        'email_verified_at',
        'last_login_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'status',
        'privilege',
        'user_register',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',        
    ];

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'usuario_empresa');
    }

    public static function setUsuario($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("img/usuario/$actual");
            }
            $imageName = Str::random(20) . '.png';
            $imagen = Image::make($foto)->encode('png', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img/usuario/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

    public function adminlte_image()
    {
        if (auth()->user()->foto === Null){
            return '/vendor/adminlte/dist/img/user.png';
        } else {
            return '/vendor/adminlte/dist/img/user.png';
        }
    }

    public function adminlte_desc()
    {
        return 'sixmab';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}