<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'equ_id';

    const CREATED_AT = 'equ_created';
    const UPDATED_AT = 'equ_updated';

    public function postulaciones()
    {
        return $this->hasMany(Postulaciones::class, 'equ_id', 'equ_id');
    }
}
