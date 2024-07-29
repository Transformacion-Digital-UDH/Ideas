<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'men_id';

    const CREATED_AT = 'men_created';
    const UPDATED_AT = 'men_updated';

    public function necesidades()
    {
        return $this->belongsToMany(Necesidades::class, 'notificars', 'men_id', 'nec_id');
    }
}
