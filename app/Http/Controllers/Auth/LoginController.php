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

    private function attemptLogin(Request $request)
    {
      $usuario = Empleado::find($request->cedula);
      if (!empty($usuario)) {
        switch ($usuario->emp_privilegio) {
          case 'a':
            $guardia = 'admin';
            break;
          case 'g':
            $guardia = 'gerente';
            break;
          case 'e':
            $guardia = 'empleado';
            break;
          default:
            return false;
        }
        $auth = Auth::guard($guardia)->attempt([
          'pk_emp_cedula' => $request->cedula,
          'emp_celular' => $request->celular,
          'password' => $request->password
        ], $request->filled('remember'));
        if ($auth) {
          //Aquí puede ir más código
          return true;
        }
      }
      return false;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'celular' => 'required|numeric|digits_between:1,15'
        ]);
    }

    protected function credentials(Request $request)
    {
        return [
          'pk_emp_cedula' => $request->cedula,
          'emp_clave' => $request->password,
          'emp_celular' => $request->celular
        ];
    }

    public function username()
    {
        return 'cedula';
    }
}
