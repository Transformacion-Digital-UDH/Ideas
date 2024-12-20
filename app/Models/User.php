<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'profesion',
        'descripcion',
        'estado',
        'se_registro',
    ];

    public function curaciones()
    {
        return $this->hasMany(propuestas::class, 'curador_id', 'id');
    }

    public function res_necesidades()
    {
        return $this->hasMany(Necesidades::class, 'responsable_id', 'id');
    }

    public function necesidades()
    {
        return $this->hasMany(Necesidades::class, 'user_id', 'id');
    }

    public function postulaciones()
    {
        return $this->belongsToMany(Propuestas::class, 'postulaciones', 'user_id', 'pro_id')
            ->withPivot('pos_id', 'pos_semestre', 'pos_seccion', 'pos_asignado', 'equ_id', 'pos_estado', 'pos_created', 'pos_updated');
    }

    public static function esRol($rol)
    {
        $user = Auth::user();
        return $user && $user->roles->contains('name', $rol);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtoupper(trim($value), 'UTF-8');
    }

    public function setEmailAtribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setTelefonoAttribute($value)
    {
        $this->attributes['telefono'] = str_replace(' ', '', trim($value));
    }
}
