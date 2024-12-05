<?php

namespace App\Http\Controllers;

use App\Models\Postulaciones;

class ApisController extends Controller
{
    public function titulo($correo = '')
    {
        $correo = strtolower(trim($correo));

        $consulta = Postulaciones::where('pos_asignado', 1)
            ->where('pos_estado', 1)
            ->whereHas('postulante', fn($query) => $query->where('email', $correo))
            ->with('propuesta:pro_id,pro_titulo')
            ->first();

        if ($consulta && $consulta->propuesta->pro_titulo) {
            $response = [
                'status' => true,
                'titulo' => $consulta->propuesta->pro_titulo
            ];
        } else {
            $response = ['status' => false];
        }
        return response()->json($response);
    }
}
