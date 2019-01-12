<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cliente', function (Blueprint $table) {
          $table->string('pk_cli_cedula',12)->primary();
          $table->string('cli_celular',15)->unique();
          $table->string('cli_email',100)->unique();
          $table->string('cli_telefono',8);
          $table->string('cli_direccion',255);
          $table->string('cli_nombre',50);
          $table->string('cli_apellido',50);
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cliente');
    }
}
