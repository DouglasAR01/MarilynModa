<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;

class CatalogoController extends Controller
{
    public function index(){
      return view('pages.catalogo',[
        'prendas' => Prenda::simplePaginate(20),
      ]);
    }
}
