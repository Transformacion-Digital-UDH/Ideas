<?php

namespace App\Http\Controllers;

class MisNecesidadesController extends Controller
{

    public function index()
    {
        $this->authorize('mis-necesidades.ver');

        return view('mis-necesidades');
    }
}
