<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrendaPalClave extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('prenda_pal_clave', function (Blueprint $table) {
          $table->unsignedInteger('ppc_fk_prenda');
          $table->unsignedInteger('ppc_fk_palabra_clave');

          $table->foreign('ppc_fk_prenda')
                ->references('pk_prenda')->on('prenda')
                ->onDelete('cascade');

          $table->foreign('ppc_fk_palabra_clave')
                ->references('pk_palabra_clave')->on('palabra_clave')
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
        Schema::dropIfExists('prenda_pal_clave');
    }
}
