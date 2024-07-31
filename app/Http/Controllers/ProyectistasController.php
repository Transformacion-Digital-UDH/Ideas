<?php

namespace App\Http\Controllers;

use App\Models\Proyectistas;
use Illuminate\Http\Request;

class ProyectistasController extends Controller
{
    public function index()
    {
        $this->authorize('proyectistas.ver');

        $proyectistas = $this->getProyectistas();
        return view('proyectistas', compact('proyectistas'));
    }

    public function getProyectistas()
    {
        $proyectistas = Proyectistas::where('proy_estado', '!=' , 0)->get();
        return $proyectistas ?? [];
    }
}
