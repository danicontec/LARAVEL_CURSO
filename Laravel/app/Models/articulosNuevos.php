<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//Para que este model con Eloquent funcione, debe tener un campo id y debe ser clave primaria, ademas de llamarse igual pero en singular a como se llama la tabla
//Si esto no es asi, hay que indicarselo a traves de atributos protegidos $table o $primaryKey pasando estos datos
class articulosnuevos extends Model
{
    //El uso del namespace y la variable protected con para añadir las referencias en la base de datos para hacer como un borrado.
    //El dato en la BBDD se queda con la nueva propiedad y no aparece en la busqueda si no se indica.
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Para indicar que sera en masa tenemos que usar la variable $fillable y permitir que las hijas lean las propiedades.
    protected $fillable=["nombre", "pais", "precio", "descripcion", "imagen", "observaciones"];
    use HasFactory;
}
