<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectistas extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'proy_id';

    const CREATED_AT = 'proy_created';
    const UPDATED_AT = 'proy_updated';

    public function propuestas()
    {
        return $this->hasMany(propuestas::class, 'proyectista_id', 'proy_id');
    }
}
