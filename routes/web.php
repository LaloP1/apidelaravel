<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NuevoController;
use App\Http\Controllers\InicioController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Esta línea de código simplifica la definición de rutas CRUD para un controlador llamado InicioController bajo la ruta base /home en una aplicación Laravel.
Route::resource('/home', InicioController::class);
