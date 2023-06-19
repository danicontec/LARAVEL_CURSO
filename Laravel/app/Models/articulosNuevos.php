<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Para que este model con Eloquent funcione, debe tener un campo id y debe ser clave primaria, ademas de llamarse igual pero en singular a como se llama la tabla
//Si esto no es asi, hay que indicarselo a traves de atributos protegidos $table o $primaryKey pasando estos datos
class articulosnuevos extends Model
{

    //Para indicar que sera en masa tenemos que usar la variable $fillable y permitir que las hijas lean las propiedades.
    protected $fillable=["nombre", "pais", "precio", "descripcion", "imagen", "observaciones"];
    use HasFactory;
}
