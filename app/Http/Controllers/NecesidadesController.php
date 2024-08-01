<?php

namespace App\Http\Controllers;

use App\Models\Necesidades;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class NecesidadesController extends Controller
{
    public function index()
    {
        $this->authorize('necesidades.ver');

        $necesidades = Necesidades::all();
        return view('necesidades', compact('necesidades'));
    }
}
