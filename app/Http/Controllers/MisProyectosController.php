<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisProyectosController extends Controller
{
    public function index()
    {
        $this->authorize('mis-proyectos.ver');
        return view('mis-proyectos');
    }
}
