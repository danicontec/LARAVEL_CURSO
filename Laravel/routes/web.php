<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//En mi caso al utilizar Laravel superior a la version 8 he de indicar la ruta completa
Route::get('/inicio', 'App\Http\Controllers\EjemploControler@inicio');
