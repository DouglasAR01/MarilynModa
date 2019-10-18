<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;

class CatalogoController extends Controller
{
    public function index(){
      return view('pages.catalogo',[
        // La condición es para solo mostrar los disponibles,
        // el método simplePaginate es para hacer la paginación a partir de 20 resultados.
        'prendas' => Prenda::where('pre_visible',1)->simplePaginate(20),
      ]);
    }
}
