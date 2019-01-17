<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturaPrenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //Esta tabla no tiene timestamps
      Schema::create('factura_prenda', function (Blueprint $table) {
          $table->unsignedInteger('fpr_fk_factura');
          $table->unsignedInteger('fpr_fk_prenda');
          $table->tinyInteger('fpr_cantidad');

          $table->primary(['fpr_fk_factura','fpr_fk_prenda']);
          $table->foreign('fpr_fk_factura')
                ->references('pk_factura')->on('factura')
                ->onDelete('cascade');
          $table->foreign('fpr_fk_prenda')
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
        Schema::dropIfExists('factura_prenda');
    }
}
