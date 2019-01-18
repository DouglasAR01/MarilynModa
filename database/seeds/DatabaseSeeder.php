<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      /* EL ORDEN IMPORTA
        Como algunas tablas requieren foraneas, es necesario que, obviamente,
        el dato exista antes de ser asignado.
      */
      $this->call(EmpleadoSeeder::class);
    }
}
