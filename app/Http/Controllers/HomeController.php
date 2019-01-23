<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('entran:admin,gerente,empleado');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empleado = auth()->user();
        $hoy = ['created_at','>=',date('Y-m-d')];
        $panel = [
          'facturasDeHoy' => $empleado->facturas()->whereDate($hoy[0],$hoy[1],$hoy[2])->get(),
          'gastosDeHoy' => $empleado->gastos()->whereDate($hoy[0],$hoy[1],$hoy[2])->get(),
        ];
        return view('home',['panel' => $panel]);
    }
}
