<?php

namespace App\Http\Controllers;

use App\Models\Necesidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisNecesidadesController extends Controller
{

    public function index()
    {
        $this->authorize('mis-necesidades.ver');

        $necesidades = $this->getNecesidades();
        return view('mis-necesidades', compact('necesidades'));
    }

    public function getNecesidades()
    {
        $user = Auth::user();
        return $user->necesidades
            ->where('nec_estado', 1)
            ->sortByDesc('nec_id');
    }
}
