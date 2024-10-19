<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LanginpageController;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/admin.php';
