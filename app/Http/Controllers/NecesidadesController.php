<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NecesidadesController extends Controller
{
    public function index()
    {
        return view('necesidades');
    }
}
