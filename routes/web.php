<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LanginpageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
use Livewire\Livewire;

Route::middleware(['guest'])->controller(GoogleController::class)->group(function () {
    Route::get('/google/redirect', 'redirect')->name('google');
    Route::get('/google/callback', 'callback');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::post('enviar-correo', function (Illuminate\Http\Request $request) {
//     // Capturar los datos del formulario
//     $asunto = $request->input('asunto');
//     $mensaje = $request->input('mensaje');

//     // Enviar el correo con los datos capturados
//     Mail::to('2021110349@udh.edu.pe')->send(new EnviarCorreo($asunto, $mensaje));

//     return 'Correo enviado exitosamente';
// })->name('enviar-correo');


Route::controller(LanginpageController::class)->group(function () {
    Route::get('/nosotros', 'nosotros')->name('nosotros');
    Route::get('/contactos', 'contactos')->name('contactos');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/necesidades/livewire/update', $handle)->name('custom-livewire.update');
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/necesidades/livewire/livewire.js', $handle);
});

require __DIR__ . '/admin.php';
