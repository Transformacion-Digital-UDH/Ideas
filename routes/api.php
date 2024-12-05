<?php

use App\Http\Controllers\ApisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/titulo/{correo}', [ApisController::class, 'titulo'])->name('titulo');
