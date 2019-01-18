<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('prenda', function (Blueprint $table) {
          $table->increments('pk_prenda');
          $table->unsignedInteger('pre_fk_categoria');
          $table->boolean('pre_visible')->default(true);
          $table->string('pre_nombre', 50);
          $table->string('pre_descripcion', 255)->nullable();
          $table->char('pre_talla', 4)->default('M'); // De XS a XXXL
          $table->tinyInteger('pre_cantidad')->default(0);
          $table->unsignedInteger('pre_precio_sugerido')->nullable();
          $table->date('pre_fecha_compra');
          $table->unsignedInteger('pre_veces_alquilado')->default(0);

          $table->foreign('pre_fk_categoria')
                ->references('pk_categoria')->on('categoria')
                ->onDelete('cascade');

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
        Schema::dropIfExists('prenda');
    }
}
