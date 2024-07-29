<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulaciones extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'pos_id';

    const CREATED_AT = 'pos_created';
    const UPDATED_AT = 'pos_updated';

    public function equipo()
    {
        return $this->belongsTo(Equipos::class, 'equ_id', 'equ_id');
    }
}
