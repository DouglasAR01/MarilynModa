<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Empleado;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    private $guardia;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:gerente')->except('logout');
        $this->middleware('guest:empleado')->except('logout');
    }
    /**
     * @author Douglas R.
     * Este método está sobrescrito, lo que hace es asignar el guardia necesario
     * y luego inicia sesión
     */
    private function attemptLogin(Request $request)
    {
      $usuario = Empleado::find($request->cedula);
      if (!empty($usuario)) {
        $this->guardia = $this->getGuardia($usuario->emp_privilegio);
        return Auth::guard($this->guardia)->attempt([
          'pk_emp_cedula' => $request->cedula,
          'emp_celular' => $request->celular,
          'password' => $request->password
        ], $request->filled('remember'));
      }
      return false;
    }
    /**
     * Método sobrescrito
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|numeric',
            'password' => 'required|string',
            'celular' => 'required|numeric|digits_between:1,15'
        ]);
    }
    /**
     * Método sobrescrito
     */
    protected function credentials(Request $request)
    {
        return [
          'pk_emp_cedula' => $request->cedula,
          'emp_clave' => $request->password,
          'emp_celular' => $request->celular
        ];
    }
    /**
     * Método sobrescrito
     */
    public function username()
    {
        return 'cedula';
    }
    /**
     * Método sobrescrito. Es el que se ejecuta después de haber autenticado con
     * éxito.
     */
    protected function authenticated(Request $request, $user)
    {
      //Acá se puede poner todo lo que se quiera luego de autenticar
      session(['cargo' => $this->guardia]);
      return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        auth(session('cargo'))->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    private function getGuardia($privilegio)
    {
        switch ($privilegio) {
          case 'a':
            return 'admin';
          case 'g':
            return 'gerente';
          case 'e':
            return 'empleado';
          default:
            return '';
        }
    }

    protected function guard()
    {
        return Auth::guard($this->guardia);
    }
}
