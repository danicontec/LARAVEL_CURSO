<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosNuevosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    /*Esta funcion crea a partir del esquema especificado
     en el archivo env la tabla indicada en el parametro de la funcion,
     con el objeto table se creara los campos segun su tipo*/

    public function up()
    {
        Schema::create('articulosNuevos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen');
            $table->string('pais');
            $table->float('precio');
            $table->text('observaciones');
            //Esta propiedad refleja en tiempo cuando crea y cuando se modifica un registro en tabla de forma automatica.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulosNuevos');
    }
}
