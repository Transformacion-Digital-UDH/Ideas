<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

Route::get('/', function () {
    return view('welcome');
});

Route::post('enviar-correo', function (Illuminate\Http\Request $request) {
    // Capturar los datos del formulario
    $asunto = $request->input('asunto');
    $mensaje = $request->input('mensaje');

    // Enviar el correo con los datos capturados
    Mail::to('2021110349@udh.edu.pe')->send(new EnviarCorreo($asunto, $mensaje));

    return 'Correo enviado exitosamente';
})->name('enviar-correo');




require __DIR__ . '/admin.php';
