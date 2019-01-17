<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFotoPrenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('foto_prenda', function (Blueprint $table) {
          $table->unsignedInteger('fop_fk_prenda');
          $table->string('fop_link');
          $table->boolean('fop_principal')->default(false);

          $table->timestamps();
          $table->primary(['fop_fk_prenda','fop_link']);
          $table->foreign('fop_fk_prenda')
                ->references('pk_prenda')->on('prenda')
                ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_prenda');
    }
}
