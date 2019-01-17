<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //se crea la tabla categoria
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('pk_categoria');
            $table->char('cat_tipo',1)->default('o'); //['a' alquiler, 'b' baja, 'g' gasto, 'o' otro]
            $table->string('cat_nombre', 50);
            $table->string('cat_descripcion', 140)->nullable();
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
      //hace drop de la tabla Categoria
        Schema::dropIfExists('categoria');
    }
}
