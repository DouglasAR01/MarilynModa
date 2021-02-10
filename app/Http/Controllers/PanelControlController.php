<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PanelControl;

class PanelControlController extends Controller
{
    function __construct()
    {
      $this->middleware('entran:admin');
    }

    public function index()
    {
      $ultimoCambio = PanelControl::latest()->first();
      return view('panelControl.panelControl',[
        'actual' => $ultimoCambio,
      ]);
    }

    public function create(Request $request)
    {
      $nuevoAjuste =  new PanelControl();
      $nuevoAjuste->pco_fk_empleado = auth()->user()->pk_emp_cedula;
      $nuevoAjuste->pco_dinero_inicial = $request->dinero_actual;
      $nuevoAjuste->pco_mantenimiento = $request->get('mantenimiento') ? True : False;
      $nuevoAjuste->save();
      return redirect()->route('panelcontrol.index')->with('success','Ajustes realizados.');
    }
}
