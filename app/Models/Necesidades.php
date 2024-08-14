<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Necesidades extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'nec_id';

    const CREATED_AT = 'nec_created';
    const UPDATED_AT = 'nec_updated';

    public function documentos()
    {
        return $this->hasMany(Documentos::class, 'nec_id', 'nec_id');
    }

    public function propuestas()
    {
        return $this->hasMany(Propuestas::class, 'nec_id', 'nec_id');
    }

    public function mensajes()
    {
        return $this->belongsToMany(Mensajes::class, 'notificars', 'nec_id', 'men_id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function estados()
    {
        return [
            'No Aplica',
            'Cancelado',
            'En Espera',
            'Curado',
            'Postulado',
            'Asignado',
            'En Planificación',
            'En Ejecución',
            'En Finalización',
            'Completado'
        ];
    }
}
