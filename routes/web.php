<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NuevoController;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/home', InicioController::class);

//Route::get('/home', [NuevoController::class, 'obtenerComics'])->name('apiMarvel.marvel');

// Route::get('/home', function (){

// });


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
