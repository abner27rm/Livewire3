<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

/*    Route::get('/dashboard', \App\Livewire\Formulario::class)
        ->name('dashboard')
        ->lazy(enabled:false); configurando la carga lenta desde la ruta cuando es un conponente de pagina completa*/


    Route::view('/prueba','prueba')->name('prueba');
});
