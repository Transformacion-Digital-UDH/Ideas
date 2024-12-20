<?php

use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\MisNecesidadesController;
use App\Http\Controllers\MisPostulaciones;
use App\Http\Controllers\MisProyectosController;
use App\Http\Controllers\NecesidadesController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PostulacionesController;
use App\Http\Controllers\PropuestasController;
use App\Http\Controllers\ProyectistasController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'registro',
    'verified',
])->group(function () {

    Route::get('/panel', [PanelController::class, 'index'])->name('panel');

    Route::controller(NecesidadesController::class)->group(function () {
        Route::get('/proyectos', 'index')->name('necesidades');
    });
    Route::controller(PropuestasController::class)->group(function () {
        Route::get('/propuestas', 'index')->name('propuestas');
    });
    Route::controller(ProyectistasController::class)->group(function () {
        Route::get('/proyectistas', 'index')->name('proyectistas');
    });
    Route::controller(MisNecesidadesController::class)->group(function () {
        Route::get('/mis-necesidades', 'index')->name('mis-necesidades');
    });
    Route::controller(EquiposController::class)->group(function () {
        Route::get('/equipos', 'index')->name('equipos');
    });

    Route::controller(PostulacionesController::class)->group(function () {
        Route::get('/postulaciones', 'index')->name('postulaciones');
    });

    Route::controller(MisPostulaciones::class)->group(function () {
        Route::get('/mis-postulaciones', 'index')->name('mis-postulaciones');
    });

    Route::controller(MisProyectosController::class)->group(function () {
        Route::get('/mis-proyectos', 'index')->name('mis-proyectos');
    });

    Route::controller(DocumentosController::class)->group(function () {
        Route::get('/documentos/ver/{file}', 'ver')->name('documentos.ver');
    });
});
