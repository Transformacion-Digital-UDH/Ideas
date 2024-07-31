<?php

namespace App\Http\Controllers;

use App\Models\Postulaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisPostulaciones extends Controller
{
    public function index()
    {
        $this->authorize('mis-postulaciones.ver');

        $postulaciones = $this->getPostulaciones();
        return view('mis-postulaciones', compact('postulaciones'));
    }

    public function getPostulaciones()
    {
        $postulaciones = Postulaciones::with('propuesta')
            ->where('user_id', Auth::user()->id)
            ->get();

        $postulaciones = $postulaciones->map(function ($postulacion) {
            $validar = Postulaciones::where('pos_asignado', '1')
                ->where('pos_estado', 1)
                ->where('pro_id', $postulacion->pro_id)
                ->exists();
            $postulacion->estado = $this->validarEstado($validar, $postulacion->pos_asignado);
            return $postulacion;
        });

        return $postulaciones;
    }

    public function validarEstado($validar, $pos_estado)
    {
        $estado = 'Pendiente';
        if ($validar) {
            if ($validar && $pos_estado) {
                $estado = 'Aprobado';
            } else {
                $estado = 'Rechazado';
            }
        }
        return $estado;
    }
}
