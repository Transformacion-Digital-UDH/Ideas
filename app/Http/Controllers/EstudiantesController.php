<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function propuestas()
    {
        return view('estudiante.propuestas');
    }
}
