<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        if (User::esRol('SOCIEDAD')) {
            return redirect('mis-necesidades');
        } elseif (User::esRol('PROYECTISTA') || User::esRol('ESTUDIANTE') || User::esRol('DOCENTE')) {
            return redirect('propuestas');
        }

        return view('panel');
    }
}
