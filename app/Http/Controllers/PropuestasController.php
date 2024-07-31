<?php

namespace App\Http\Controllers;

use App\Models\Propuestas;
use App\Models\User;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    public function index()
    {
        $propuestas = $this->getPropuestas();
        return view('propuestas', compact('propuestas'));
    }

    public function getPropuestas()
    {
        if (User::esRol('ESTUDIANTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->where('pro_tipo', 'Tesis')->get();
        } else if (User::esRol('DOCENTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->where('pro_tipo', 'Curso')->get();
        } else {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->get();
        }
        return $propuestas ?? [];
    }
}
