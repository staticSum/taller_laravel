<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// prefix URL , name RUTA, group ES EL GRUPO DE RUTAS
Route::prefix('ejercicios')->name('test.')->group(function(){
    Route::get('/hola/mundo', function() {
        return 'Hello World';
    })->name('hola');
    
    // // OBLIGATORIO
    // Route::get('/saludo/{name}', function(string $name) {
    //     return 'Hola '. $name;
    // })->name('saludo');
    
    // OPTIONAL
    Route::get('/saludo/{name?}', function(string $name = '---') {
        return 'Hola '. $name;
    })->name('saludo');
});

