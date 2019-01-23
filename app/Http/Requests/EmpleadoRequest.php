<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Empleado;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
          case 'POST':
            return [
                'cedula' => 'numeric|digits_between:7,12|unique:empleado,pk_emp_cedula|required',
                'celular' => 'numeric|digits_between:10,15|unique:empleado,emp_celular|required',
                'email' => 'email|max:100|unique:empleado,emp_email|required',
                'clave' => 'string|min:6|confirmed|required',
                'genero' => 'required',
                'direccion' => 'string|required|max:255',
                'nombre' => 'string|required|max:50',
                'apellido' => 'string|required|max:50',
                'privilegio' => 'required'
            ];

          case 'PUT':
          case 'PATCH':
            $empleado = Empleado::find($this->route('empleado'));
            return [
              'cedula' => [
                'numeric',
                'digits_between:7,12',
                'required',
                Rule::unique('empleado','pk_emp_cedula')
                ->ignore($empleado->pk_emp_cedula,'pk_emp_cedula')
              ],
              'celular' => [
                'numeric',
                'digits_between:10,15',
                'required',
                Rule::unique('empleado','emp_celular')
                ->ignore($empleado->emp_celular,'emp_celular')
              ],
              'email' => [
                'email',
                'max:100',
                'required',
                Rule::unique('empleado','emp_email')
                ->ignore($empleado->emp_email,'emp_email')
              ],
              'clave' => 'string|min:6|confirmed|required',
              'genero' => 'required',
              'direccion' => 'string|required|max:255',
              'nombre' => 'string|required|max:50',
              'apellido' => 'string|required|max:50',
              'privilegio' => 'required'
            ];

          default:
            break;
        }
    }
}
