<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Session;

class EmpleadoController extends Controller
{
    function __construct()
    {
        $this->middleware('entran:admin,gerente,empleado')->
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
        return view('empleados.indexEmpleado',[
          'empleados' => Empleado::all(),
          'currentRouteName' => Route::currentRouteName(),
          'infoAdicional' => [
            'priv' => $this->privilegioParser(),
          ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.crearEmpleado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $nuevoEmp = new Empleado();
        $nuevoEmp->pk_emp_cedula = $request->cedula;
        $nuevoEmp->emp_celular = $request->celular;
        $nuevoEmp->emp_email = $request->email;
        $nuevoEmp->emp_clave = Hash::make($request->clave);
        $nuevoEmp->emp_genero = $request->genero;
        $nuevoEmp->emp_direccion = $request->direccion;
        $nuevoEmp->emp_nombre = $request->nombre;
        $nuevoEmp->emp_apellido = $request->apellido;
        $nuevoEmp->emp_privilegio = $request->privilegio;
        if ($nuevoEmp->save()) {
          Session::flash('success', 'Empleado guardado');
          return redirect()->route('empleados.index');
        }
        Session::flash('error', 'Empleado no guardado');
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $pk_emp_cedula)
    {
        if ($this->verificarEmpleado($pk_emp_cedula)) {
          $empleado = Empleado::find($pk_emp_cedula);
          if ($empleado) {
            return view('empleados.verEmpleado',[
              'empleados' => [$empleado],
              'infoAdicional' => [
                'priv' => $this->privilegioParser(),
              ]
            ]);
          }
          $request->session()->flash('error', 'Usuario no encontrado');
        }
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $pk_emp_cedula)
    {
        $empleado = Empleado::find($pk_emp_cedula);

        //Verifica que se haya encontrado un empleado con esa cédula
        if (empty($empleado)) {
          $request->session()->flash('error', 'Empleado no encontrado');
          return back();
        }
        //Verifica que el empleado que se desea editar sea posible editarlo con
        //los privilegios actuales

        //Gerente debería poder editar empleado, pero no el campo de privilegio!!!!
        if (!$this->verificarEmpleado($pk_emp_cedula)) {
          $request->session()->flash('error', 'No tiene permisos para modificar este empleado.');
          return back();
        }

        return view('empleados.editarEmpleado',['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, $pk_emp_cedula)
    {
        if (!$this->verificarEmpleado($pk_emp_cedula)) {
          Session::flash('error', 'No tiene permisos para modificar este empleado');
          return redirect()->route('home');
        }
        $empleado = Empleado::find($pk_emp_cedula);
        $empleado->pk_emp_cedula = $request->cedula;
        $empleado->emp_celular = $request->celular;
        $empleado->emp_email = $request->email;
        $empleado->emp_clave = Hash::make($request->clave);
        $empleado->emp_genero = $request->genero;
        $empleado->emp_direccion = $request->direccion;
        $empleado->emp_nombre = $request->nombre;
        $empleado->emp_apellido = $request->apellido;
        //Con esto se evita un escalado de privilegios indeseado mediante
        //modificación del campo oculto en la vista.
        if (auth()->user()->emp_privilegio==='a') {
          $empleado->emp_privilegio = $request->privilegio;
        }
        if ($empleado->save()) {
          //Verifica si el usuario a modificar era el usuario logeado
          if (auth()->user()->pk_emp_cedula==$pk_emp_cedula) {
            session()->flush();
            Session::flash('success', 'Cambios guardados exitosamente,
                            por favor, inicie sesión nuevamente.');
            return redirect('login');
          }

          Session::flash('success', 'Cambios guardados exitosamente');
          return redirect()->route('empleados.index');
        }
        Session::flash('error', 'No tiene permisos para modificar este empleado');
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pk_emp_cedula)
    {
        if ($pk_emp_cedula==auth()->user()->pk_emp_cedula) {
          $request->session()->flash('error', 'No es posible eliminarse a sí mismo.');
          return redirect()->route('empleados.index');
        }
        $empleado = Empleado::find($pk_emp_cedula);
        if($empleado){
          $empleado->delete();

          $request->session()->flash('success', 'Empleado eliminado');
          return redirect()->route('empleados.index');
        }
        $request->session()->flash('error', 'Empleado no encontrado');
        return redirect()->route('empleados.index');
    }

    private function verificarEmpleado($pk_emp_cedula)
    {
        $empleado = auth()->user();
        if ($pk_emp_cedula==$empleado->pk_emp_cedula
             or $empleado->emp_privilegio=='a') {
          return 1;
        }
        return 0;
    }

    private function privilegioParser()
    {
        switch (auth()->user()->emp_privilegio) {
          case 'a':
            return 2;
          case 'g':
            return 1;
          default:
            return 0;
        }
    }
}
