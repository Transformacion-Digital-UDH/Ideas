<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    public function index()
    {
        return view('propuestas');
    }
}
