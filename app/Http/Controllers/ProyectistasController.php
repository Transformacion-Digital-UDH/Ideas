<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectistasController extends Controller
{
    public function index()
    {
        $this->authorize('proyectistas.ver');

        return view('proyectistas');
    }
}
