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
