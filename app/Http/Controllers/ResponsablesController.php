<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsablesController extends Controller
{
    public function index()
    {
        return view('mis-responsabilidades');
    }
}
