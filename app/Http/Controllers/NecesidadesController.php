<?php

namespace App\Http\Controllers;

class NecesidadesController extends Controller
{
    public function index()
    {
        $this->authorize('necesidades.ver');

        return view('necesidades');
    }
}
