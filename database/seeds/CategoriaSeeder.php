<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
          //Categorias de tipo 'a', alquiler
          'Fiesta' => ['Vestidos para fiestas','a'],
          'Novia' => ['Vestidos para novias', 'a'],
          'Caballero' => ['Trajes para caballero para toda ocasión', 'a'],
          'Niño' => ['Trajes para niño', 'a'],
          'Gala' => ['Vestidos de gala, ideales para situaciones formales', 'a'],
        ];
        foreach ($categorias as $nombre => $colums) {
          Categoria::create([
            'cat_nombre' => $nombre,
            'cat_descripcion' => $colums[0],
            'cat_tipo' => $colums[1]
          ]);
        }
    }
}
