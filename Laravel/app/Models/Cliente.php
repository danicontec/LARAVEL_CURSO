<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Metodo para claves foraneas unicas
    public function articuloNuevo(){

        return $this -> hasOne("App\Models\articulosNuevos");
    }

    // Metodo para claves foraneas con registros multiples

    public function articulos(){
        return $this -> hasMany("App\Models\articulosNuevos");
    }

    // Este método referencia de muchos a muchos entre  la tabla de referencia de claves, los perfiles y los clientes.
    public function perfils(){
        return $this->belongsToMany("App\Models\Perfil");
    }

    use HasFactory;
}
