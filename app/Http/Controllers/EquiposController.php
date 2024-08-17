<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index()
    {
        $this->authorize('equipos.ver');
        return view('equipos');
    }
}
