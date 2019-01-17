<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('factura', function (Blueprint $table) {
          $table->increments('pk_factura');
          $table->string('fac_fk_cliente');
          $table->string('fac_fk_empleado');
          $table->unsignedInteger('fac_valor_total');
          $table->unsignedInteger('fac_valor_separado');
          $table->unsignedInteger('fac_valor_saldo')->nullable();
          $table->date('fac_fecha_entrega');
          $table->date('fac_fecha_devolucion');
          $table->date('fac_fecha_entregado')->nullable();
          $table->date('fac_fecha_devuelto')->nullable();
          $table->unsignedInteger('fac_deposito')->nullable();

          $table->foreign('fac_fk_cliente')
                ->references('pk_cli_cedula')->on('cliente')
                ->onDelete('cascade');


          $table->foreign('fac_fk_empleado')
                ->references('pk_emp_cedula')->on('empleado')
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
        Schema::dropIfExists('factura');
    }
}
