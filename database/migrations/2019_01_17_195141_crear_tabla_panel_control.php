<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPanelControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('panel_control', function (Blueprint $table) {
          $table->increments('pk_panel_control');
          $table->string('pco_fk_empleado');
          $table->unsignedInteger('pco_dinero_inicial')->default(0);
          $table->boolean('pco_mantenimiento')->default(false);
          $table->timestamps();

          $table->foreign('pco_fk_empleado')
                ->references('pk_emp_cedula')->on('empleado')
                ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panel_control');
    }
}
