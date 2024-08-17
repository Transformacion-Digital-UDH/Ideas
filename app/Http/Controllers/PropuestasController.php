<?php

namespace App\Http\Controllers;

class PropuestasController extends Controller
{
    public function index()
    {
        $this->authorize('propuestas.ver');
        
        return view('propuestas');
    }
}
