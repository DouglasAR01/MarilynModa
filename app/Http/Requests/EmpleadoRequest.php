<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            return [];

          default:
            break;
        }
    }
}
