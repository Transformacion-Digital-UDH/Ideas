<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostulacionesController extends Controller
{
    public function index()
    {
        $this->authorize('postulaciones.ver');
        return view('postulaciones');
    }
}
