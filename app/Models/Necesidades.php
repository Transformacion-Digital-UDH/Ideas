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


    public static function estados()
    {
        return [
            'Pendiente',
            'En Revisión',
            'Aprobada',
            'No Aplicable',
            'Rechazada',
            'En Proceso',
            'Completada'
        ];
    }
}
