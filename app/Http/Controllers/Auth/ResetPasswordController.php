<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Empleado;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        //Verifica que las contraseñas coincidan
        if (!($request->password===$request->password_confirmation)) {
          return $this->sendResetFailedResponse($request,'passwords.password');
        }

        //Verifica que el token exista para ese correo y además que no haya expirado
        if (!$this->verificarEmailToken($request)) {
          return $this->sendResetFailedResponse($request,'passwords.token');
        }

        //Cambia la contraseña
        $empleado = $this->getEmpleado($request);
        $empleado->emp_clave = Hash::make($request->password);
        $empleado->setRememberToken(Str::random(60));
        $empleado->save();
        $this->destruirToken($request);
        return redirect('/login');
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }

    private function destruirToken(Request $request)
    {
      $credenciales = $this->credentials($request);
      DB::statement("DELETE FROM password_resets WHERE email='".$credenciales['emp_email']."';");
    }

    private function verificarEmailToken(Request $request)
    {
        $credenciales = $this->credentials($request);
        $tupla = $this->getTupla($credenciales);

        //Verifica que exista la tupla
        if (!$tupla) {
          return 0;
        }

        //Verifica que el token no haya expirado
        if ($this->verificarExpirado($tupla->created_at)) {
          $this->destruirToken($request);
          return 0;
        }

        //Verifica que el token corresponda
        if (!Hash::check($credenciales['token'],$tupla->token)) {
          return 0;
        }

        return 1;
    }

    protected function credentials(Request $request)
    {
        return [
          'emp_email' => $request->email,
          'emp_clave' => $request->password,
          'emp_clave_c' => $request->password_confirmation,
          'token' => $request->token
        ];
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    private function verificarExpirado($fechaToken)
    {
        $tiempoLimite = config('auth.passwords.empleados.expire')*60; //*60 para tenerlo en segundos
        return Carbon::parse($fechaToken)->addSeconds($tiempoLimite)->isPast();
    }

    private function getEmpleado(Request $request)
    {
        return Empleado::where('emp_email',$request->email)->first();
    }

    private function getTupla(array $credenciales)
    {
        return DB::table('password_resets')->
               where('email',$credenciales['emp_email'])->first();
    }
}
