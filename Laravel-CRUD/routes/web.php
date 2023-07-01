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
Route::resource('/productos', 'App\Http\Controllers\ProductosController');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', 'App\Http\Controllers\ProductosController@index');
Route::get('/crear', 'App\Http\Controllers\ProductosController@create');
