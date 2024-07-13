<?php

use App\Http\Controllers\AsesorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


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
   
    Route::resource('asesor', AsesorController::class);

});


