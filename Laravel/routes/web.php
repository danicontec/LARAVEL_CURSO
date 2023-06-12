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

// Route::get('/', function () {
//     return view('welcome');
// });


//En mi caso al utilizar Laravel superior a la version 8 he de indicar la ruta completa

Route::get('/inicio', 'App\Http\Controllers\EjemploControler@inicio');
Route::get('/', 'App\Http\Controllers\WebPagesController@inicio');
Route::get('/somos', 'App\Http\Controllers\WebPagesController@somos');
Route::get('/foro', 'App\Http\Controllers\WebPagesController@foro');
Route::get('/ubicacion', 'App\Http\Controllers\WebPagesController@ubicacion');
Route::get('/ubicacion', 'App\Http\Controllers\WebPagesController@contacto');

// La instruccion de abajo crea los links automaticamente, siempre y cuando hayamos creado el Controller con la opcion --resource

// Route::resource("post","App\Http\Controllers\WebPagesController");