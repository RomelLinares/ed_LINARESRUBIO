<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;

Route::get('/', function () {

    return view('plantilla.app');
});

Route::get('/entrada', function () {
    return view('entrada.index');
});
Route::resource('entrada', EntradaController::class);
