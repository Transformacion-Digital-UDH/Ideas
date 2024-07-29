<?php

namespace App\Http\Controllers;

use App\Models\Necesidades;
use Illuminate\Http\Request;

class NecesidadesController extends Controller
{
    public function index()
    {
        $necesidades = Necesidades::all();
        return view('necesidades', compact('necesidades'));
    }
}
