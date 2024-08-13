<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoProceso extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'est_id';

    const CREATED_AT = 'est_created';
    const UPDATED_AT = 'est_updated';
}
