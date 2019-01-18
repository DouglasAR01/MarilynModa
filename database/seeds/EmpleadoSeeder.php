<?php

use Illuminate\Database\Seeder;
use App\Empleado;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      Empleado::unguard();
      Empleado::create([
        'pk_emp_cedula' => '1',
        'emp_celular' => '1',
        'emp_email' => $faker->freeEmail,
        'emp_clave' => Hash::make('clave'),
        'emp_genero' => 'm',
        'emp_direccion' => $faker->address,
        'emp_nombre' => 'Douglas Andrés',
        'emp_apellido' => 'Ramírez Brujes',
        'emp_privilegio' => 'a'
      ]);
      Empleado::create([
        'pk_emp_cedula' => '2',
        'emp_celular' => '2',
        'emp_email' => $faker->freeEmail,
        'emp_clave' => Hash::make('clave'),
        'emp_genero' => 'f',
        'emp_direccion' => $faker->address,
        'emp_nombre' => 'Honryxito emoxito',
        'emp_apellido' => 'Pena Contreras',
        'emp_privilegio' => 'g'
      ]);
      Empleado::create([
        'pk_emp_cedula' => '3',
        'emp_celular' => '3',
        'emp_email' => $faker->freeEmail,
        'emp_clave' => Hash::make('clave'),
        'emp_genero' => 'o',
        'emp_direccion' => $faker->address,
        'emp_nombre' => 'Diego Alberto',
        'emp_apellido' => 'Medina Perra',
        'emp_privilegio' => 'e'
      ]);
      Empleado::reguard();
    }
}
