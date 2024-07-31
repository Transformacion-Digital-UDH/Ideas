<?php

use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MisNecesidadesController;
use App\Http\Controllers\MisPostulaciones;
use App\Http\Controllers\NecesidadesController;
use App\Http\Controllers\PaisiController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PostulacionesController;
use App\Http\Controllers\PropuestasController;
use App\Http\Controllers\ProyectistasController;
use App\Http\Controllers\VriController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {

    Route::get('/panel', [PanelController::class, 'index'])->name('panel');

    Route::controller(NecesidadesController::class)->group(function () {
        Route::get('/necesidades', 'index')->name('necesidades');
        Route::post('/necesidades', 'guardar')->name('necesidades.guardar');
        Route::put('/necesidades', 'actualizar')->name('necesidades.actualizar');
        Route::delete('/necesidades', 'eliminar')->name('necesidades.eliminar');
    });
    Route::controller(PropuestasController::class)->group(function () {
        Route::get('/propuestas', 'index')->name('propuestas');
        Route::post('/propuestas', 'curar')->name('propuestas.curar');
        Route::put('/propuestas', 'actualizar')->name('propuestas.actualizar');
        Route::delete('/propuestas', 'eliminar')->name('propuestas.eliminar');
    });
    Route::controller(ProyectistasController::class)->group(function () {
        Route::get('/proyectistas', 'index')->name('proyectistas');
        Route::get('/proyectistas/{id}', 'index')->name('proyectistas.ver');
        Route::post('/proyectistas', 'guardar')->name('proyectistas.guardar');
        Route::put('/proyectistas', 'actualizar')->name('proyectistas.actualizar');
        Route::delete('/proyectistas', 'eliminar')->name('proyectistas.eliminar');
    });
    Route::controller(MisNecesidadesController::class)->group(function () {
        Route::get('/mis-necesidades', 'index')->name('mis-necesidades');
        Route::post('/mis-necesidades', 'guardar')->name('mis-necesidades.guardar');
        Route::put('/mis-necesidades', 'actualizar')->name('mis-necesidades.actualizar');
        Route::delete('/mis-necesidades', 'eliminar')->name('mis-necesidades.eliminar');
    });
    Route::controller(EquiposController::class)->group(function () {
        Route::get('/equipos', 'index')->name('equipos');
        Route::post('/equipos', 'guardar')->name('equipos.guardar');
        Route::put('/equipos', 'actualizar')->name('equipos.actualizar');
        Route::delete('/equipos', 'eliminar')->name('equipos.eliminar');
    });

    Route::controller(PostulacionesController::class)->group(function () {
        Route::get('/postulaciones', 'index')->name('postulaciones');
        Route::post('/postulaciones', 'guardar')->name('postulaciones.guardar');
        Route::put('/postulaciones', 'actualizar')->name('postulaciones.actualizar');
        Route::delete('/postulaciones', 'eliminar')->name('postulaciones.eliminar');
    });

    Route::controller(MisPostulaciones::class)->group(function () {
        Route::get('/mis-postulaciones', 'index')->name('mis-postulaciones');
    });

    Route::controller(PaisiController::class)->group(function () {
        Route::get('/paisi/necesidades', 'necesidades')->name('paisi.necesidades');
        Route::get('/paisi/propuestas', 'propuestas')->name('paisi.propuestas');
    });

    Route::controller(VriController::class)->group(function () {
        Route::get('/vri/necesidades', 'necesidades')->name('vri.necesidades');
        Route::get('/vri/propuestas', 'propuestas')->name('vri.propuestas');
    });

});
