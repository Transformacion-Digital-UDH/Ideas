<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Postulaciones extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'pos_id';

    const CREATED_AT = 'pos_created';
    const UPDATED_AT = 'pos_updated';

    public function postulante()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipos::class, 'equ_id', 'equ_id');
    }

    public function propuesta()
    {
        return $this->belongsTo(Propuestas::class, 'pro_id', 'pro_id');
    }

    public static function postulaciones_ids()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $ids = Postulaciones::where('user_id', $user_id)
                ->pluck('pro_id')
                ->toArray();
        }
        return $ids ?? [];
    }
}
