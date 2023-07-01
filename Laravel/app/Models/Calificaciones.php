<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{

    //Funcion que establece una relacion polimorfica a traves de una tabla existente
    public function calificacion(){

        return $this -> morphTo();
    }
    use HasFactory;
}
