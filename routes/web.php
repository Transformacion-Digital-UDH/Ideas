<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->controller(GoogleController::class)->group(function () {
    Route::get('/google/redirect', 'redirect')->name('google');
    Route::get('/google/callback', 'callback');
});

Route::get('/', function () {
    return view('welcome');
});








require __DIR__ . '/admin.php';
