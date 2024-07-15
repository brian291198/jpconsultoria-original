<?php

use App\Http\Controllers\AsesorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClientesController;

Route::get('/', function () {
  return redirect()->route('login'); // Redirige a la ruta 'login'
});

Route::get('/pe', function () {
  return view('admin.eliminar-plantilla');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('admin.plantilla');
    });
    Route::fallback(function () {
      return view('errores.errors-404');
    });
    Route::get('/home', [HomeController::class, 'retornarHome'])->name('retornarHome');
    
    /* ASESORES */
    Route::resource('asesores', AsesorController::class)->names('asesores');
    /* CLIENTES */
    Route::resource('clientes', ClientesController::class)->names('clientes');
    Route::resource('usuarios', UsuarioController::class)->names('usuarios');
    Route::resource('roles',RolController::class)->names('roles');

});


