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
            $propuestas = Propuestas::where('pro_estado', 1)->get();
        } else {
            $propuestas = Propuestas::where('pro_estado', 1)->get();
        }
        return $propuestas ?? [];
    }
}
