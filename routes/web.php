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


Route::controller(LanginpageController::class)->group(function () {
    Route::get('/nosotros', 'nosotros')->name('nosotros');
    Route::get('/contactos', 'contactos')->name('contactos');
});

require __DIR__ . '/admin.php';
