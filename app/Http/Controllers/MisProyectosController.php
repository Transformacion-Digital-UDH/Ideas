<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisProyectosController extends Controller
{
    public function index()
    {
        return view('mis-proyectos');
    }
}
