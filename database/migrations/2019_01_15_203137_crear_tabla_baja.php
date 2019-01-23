<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('baja', function (Blueprint $table) {
          $table->increments('pk_baja');
          $table->unsignedInteger('bja_fk_categoria');
          $table->unsignedInteger('bja_fk_prenda');
          $table->string('bja_fk_empleado');
          $table->string('bja_motivo', 255);
          $table->string('bja_cod_factura', 20)->nullable();
          $table->integer('bja_precio_venta')->nullable();

          $table->foreign('bja_fk_categoria')
                ->references('pk_categoria')->on('categoria')
                ->onDelete('cascade');

          $table->foreign('bja_fk_prenda')
                ->references('pk_prenda')->on('prenda')
                ->onDelete('cascade');

          $table->foreign('bja_fk_empleado')
                ->references('pk_emp_cedula')->on('empleado')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('baja');
    }
}
