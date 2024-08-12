<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyectos extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'tpro_id';

    const CREATED_AT = 'tpro_created';
    const UPDATED_AT = 'tpro_updated';

    public function propuestas()
    {
        return $this->hasMany(Propuestas::class, 'tpro_id', 'tpro_id');
    }
}
