<?php

use App\Models\articulosNuevos;
use App\Models\Cliente;
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

//Metodo que trabaja con el modelo creado para mostrarlos todos, devuelve los datos en parentesis
//Para que este model con Eloquent funcione, debe tener un campo id y debe ser clave primaria, ademas de llamarse igual pero en singular a como se llama la tabla
//Si esto no es asi, hay que indicarselo a traves de atributos protegidos $table o $primaryKey pasando estos datos
Route::get('/articulos', function(){
    $articulos = articulosNuevos::all();

    foreach($articulos as $art){
        echo $art . "<br>";
        //Para acceder a una unica propiedad se hara a traves de un objeto tomando como propiedad el nombre del campo
        echo "<br>". $art -> nombre;
    }
});

// Para aplicar filtros en eloquent existen diversas funciones explicadas en la documentacion https://laravel.com/docs/8.x/queries

Route::get('/filtros', function(){
    $articulosFiltrados = articulosNuevos::all()->where("id", "3");
    return $articulosFiltrados;
});

//Para trabajar con inserciones en la base de datos se hara tambien a traves de objetos, donde cada campo de la tabla es una propiedad

Route::get('/insercion', function(){
//Al hacer la insercion de esta forma los campos de fecha especificados en el model se rellenan solos
    $articulo = new articulosNuevos;
    $articulo -> nombre = "JUGUETE";
    $articulo -> descripcion = "Para niños";
    $articulo -> imagen = "No disponible";
    $articulo -> pais = "Alemania";
    $articulo -> precio = "28.73";
    $articulo -> observaciones = "Aun no esta incluido en esta tienda";

    $saved = $articulo -> save();

    if ($saved){
        echo "Valores insertados correctamente";
    } else {
        echo "Fallo al insertar registro";
    }
});

Route::get('/actualizacion', function(){
    //Al hacer la actualizacion de esta forma los campos de fecha especificados en el model se actualizan en el campo correspondiente
    $articulo = articulosNuevos::find("4");
    $articulo -> nombre = "JUGUETE";
    $articulo -> descripcion = "Para niños";
    $articulo -> imagen = "No disponible";
    $articulo -> pais = "Alemania";
    $articulo -> precio = "28.73";
    $articulo -> observaciones = "El articulo esta ya incluido en tienda";

    $saved = $articulo -> save();

    if ($saved){
        echo "El registro se ha actualizado";
    } else {
        echo "Fallo al actualizar el registro";
    }
});

Route::get('/deletecondition', function(){

    // Hay dos maneras de borrar, por condicion y por dato, aqui se recogen los dos.
    // Se puede usar otros metodos segun lo que se requiera buscar antes de borrar, por cada condicion llamar otro método where
    $deletewhere = articulosNuevos::where("pais","!=", "españa") -> delete();
    // $deletewhere = articulosNuevos::where("pais", "españa") -> delete();
    if ($deletewhere){
        echo "Borrado con exito";
    } else {
        echo "Fallo al borrar";
    }

});

// En este método se puede usar una insercion a traves de un Array asociativo.
// Para usar esto hay que indicarle al modelo del que parte que se va a realizar esta accion en masa.
//Los campos deben ser exactamente los mismos entre la variable de $fillable y el array asociativo
Route::get('/insertvalues', function(){
    $quantity = articulosNuevos::create(["nombre"=>"mochila", "precio"=>15.42,
     "pais"=>"Dinamarca", "descripcion"=>"Articulo importado despues de fabricacion",
     "imagen"=>"No", "observaciones"=>"Ninguna"]);

    if($quantity){
        echo "Registro insertado con exito";
    } else {
        echo "Fallo en la insercion";
    }

});

//Ruta para probar el softdelete
Route::get('/softdelete', function(){
    $softdelete = articulosNuevos::find(5)->delete();

    if($softdelete){
        echo "Registro mandado a papelera con exito";
    }
});

//Para ver articulo borrado la siguiente ruta
//Para ver el articulo exacto hay que pasar un where como metodo de objeto sino aparceran todos como en este ejemplo
Route::get('/seedeletes', function(){

    $articulos = articulosnuevos::withTrashed() -> get();

    return $articulos;
});

// Para borrar un registro sin que se registre en la papelera seria con forceDelete

Route::get('/forcedelete', function(){
    $forcedelete = articulosNuevos::withTrashed() -> where("id", 5) -> forceDelete();
});

// Para restaurar los registros de la papelera se hace co el metodo restore
Route::get('/restore', function(){

    $restored = articulosNuevos::withTrashed()->restore();

    if($restored){
        echo "Articulos restaurados con exito";
    } else {
        echo "No hay nada que restaurar";
    }
});

//Ruta provisional para añadir datos de clientes
Route::get('/addcliente', function(){
    $cliente = new Cliente;
    $cliente -> nombre = 'Javier';
    $cliente -> apellidos = 'Perez';

    $saved = $cliente -> save();

    $cliente2 = new Cliente;
    $cliente2 -> nombre = 'Demian';
    $cliente2 -> apellidos = 'Naranjo';

    $saved2 = $cliente2 -> save();



    if($saved && $saved2){
        echo "Registros guardados con exito";
    }
});

