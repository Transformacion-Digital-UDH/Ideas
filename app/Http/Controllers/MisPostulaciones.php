<?php

namespace App\Http\Controllers;

class MisPostulaciones extends Controller
{
    public function index()
    {
        $this->authorize('mis-postulaciones.ver');

        return view('mis-postulaciones');
    }
}
