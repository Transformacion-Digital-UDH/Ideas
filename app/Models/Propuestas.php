<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuestas extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'pro_id';

    const CREATED_AT = 'pro_created';
    const UPDATED_AT = 'pro_updated';

    public function necesidad()
    {
        return $this->belongsTo(Necesidades::class, 'nec_id', 'nec_id');
    }

    public function proyectista()
    {
        return $this->belongsTo(Proyectistas::class, 'proyectista_id', 'proy_id');
    }

    public function curador()
    {
        return $this->belongsTo(User::class, 'curador_id', 'id');
    }

    public function postulantes()
    {
        return $this->belongsToMany(User::class, 'postulaciones', 'pro_id', 'user_id')
            ->withPivot('pos_id', 'pos_semestre', 'pos_seccion', 'pos_asignado', 'equ_id', 'pos_estado', 'pos_created', 'pos_updated');
    }

    public static function estados()
    {
        return [
            'En Espera',
            'En Desarrollo',
            'En Revisión',
            'Aprobada',
            'Rechazada',
            'Implementación',
            'Completada',
            'Cancelada'
        ];
    }
}
