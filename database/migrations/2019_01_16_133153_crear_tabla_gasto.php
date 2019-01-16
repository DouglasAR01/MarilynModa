<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGasto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('gasto', function (Blueprint $table) {
          $table->increments('pk_gasto');
          $table->string('gas_fk_empleado');
          $table->unsignedInteger('gas_fk_categoria');
          $table->string('gas_nombre', 30);
          $table->string('gas_motivo', 255);
          $table->integer('gas_precio');

          $table->foreign('gas_fk_empleado')
                ->references('pk_emp_cedula')->on('empleado')
                ->onDelete('cascade');

          $table->foreign('gas_fk_categoria')
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
        Schema::dropIfExists('gasto');
    }
}
