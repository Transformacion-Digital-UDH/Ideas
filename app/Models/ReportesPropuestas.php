<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportesPropuestas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'rep_id';

    const CREATED_AT = 'rep_created';
    const UPDATED_AT = 'rep_updated';

    public function propuesta()
    {
        return $this->belongsTo(Propuestas::class, 'pro_id');
    }
}
