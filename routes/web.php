<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\DesarrolladorController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
// Route::get('/proyectos/insert', [ProyectoController::class, 'create'])->name('proyectos.insert');

// Todas las rutas en una sola línea
Route::resource('proyectos', ProyectoController::class);
Route::resource('desarrolladores', DesarrolladorController::class);
?>