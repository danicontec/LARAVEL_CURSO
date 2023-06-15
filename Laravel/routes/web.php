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
Route::get('/contacto', 'App\Http\Controllers\WebPagesController@contacto');

// La instruccion de abajo crea los links automaticamente, siempre y cuando hayamos creado el Controller con la opcion --resource

// Route::resource("post","App\Http\Controllers\WebPagesController");

//La funcio get tambien puede recibir como parametro una funcion anónima para trabajar con nla base de datos

Route::get('/bbdd', function(){

    //Para hacer consultas, este metodo tambien devuelve array dimensional
    $data = DB::select("SELECT * FROM ARTICULOSNUEVOS");

    foreach($data as $values){
        foreach($values as $strings){

            echo " ". $strings   ;
        }
        echo "<br>";
    }
});

Route::get('/update', function(){
    $update = DB::update("UPDATE ARTICULOSNUEVOS SET NOMBRE='PINGU' WHERE ID=1");
    
    if($update){
        echo "Registro actualizado";
    }

    else{
        echo "Fallo al actualizar";
    }
});

Route::get('/delete', function(){
    $delete = DB::delete("DELETE FROM ARTICULOSNUEVOS WHERE ID=2");

    if($delete){
        echo "Registro borrado";
    }

    else {
        echo "No se ha podido borrar el registro";
    }
} );

Route::get('/insert', function(){
    $insert = DB::insert("INSERT INTO ARTICULOSNUEVOS (NOMBRE, DESCRIPCION, IMAGEN, PAIS, PRECIO, OBSERVACIONES) VALUES ('JUGUETE', 'JUGUETE DE NIÑOS', 'NO', 'ESPAÑA', 12.30, 'PRODUCTO POR DESCATALOGAR')");

    if($insert){
        echo "Datos insertados correctamente";
    } else {

        echo "Fallo al insertar registros";
    }
});