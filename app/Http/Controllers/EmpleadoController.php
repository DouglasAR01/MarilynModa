<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class EmpleadoController extends Controller
{
    function __construct()
    {
      $this->middleware('entran:admin,gerente,empleados')->
        except(['create','store','destroy']);
      $this->middleware('entran:admin')->only(['create','store','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleado::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'crear';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pk_emp_cedula)
    {
        if ($this->verificarEmpleado($pk_emp_cedula)) {
          $empleado = Empleado::find($pk_emp_cedula);
          if ($empleado) {
            return $empleado;
          }
          return 'Usuario no encontrado';
        }
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'editar';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pk_emp_cedula)
    {
        if ($pk_emp_cedula==session('usuario')->pk_emp_cedula) {
          return 'No es posible eliminarse a sí mismo.';
        }
        $empleado = Empleado::find($pk_emp_cedula);
        if($empleado){
          $empleado->delete();
          return 'Empleado eliminado';
        }
        return 'Empleado no encontrado';
    }

    private function verificarEmpleado($pk_emp_cedula)
    {
        $usuario = session('usuario');
        if ($pk_emp_cedula==$usuario->pk_emp_cedula
             or $usuario->emp_privilegio=='a') {
          return 1;
        }
        return 0;
    }
}
