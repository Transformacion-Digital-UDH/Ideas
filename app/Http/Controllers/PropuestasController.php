<?php

namespace App\Http\Controllers;

use App\Models\Propuestas;

class PropuestasController extends Controller
{
    public function index()
    {
        $this->authorize('propuestas.ver');

        return view('propuestas');
    }

    public static function codigoUnico($pro_id)
    {
        do {
            $codigo = generar_codigo($pro_id, 6) . date('Y');
            $verificar = Propuestas::where('pro_codigo', $codigo)->first();
        } while ($verificar);

        return $codigo;
    }
}
