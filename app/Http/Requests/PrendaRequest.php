<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Prenda;
use App\Categoria;
class PrendaRequest extends FormRequest
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

    // $table->increments('pk_prenda');
    // $table->unsignedInteger('pre_fk_categoria');
    // $table->boolean('pre_visible')->default(true);
    // $table->string('pre_nombre', 50);
    // $table->string('pre_descripcion', 255)->nullable();
    // $table->char('pre_talla', 4)->default('M'); // De XS a XXXL
    // $table->tinyInteger('pre_cantidad')->default(0);
    // $table->unsignedInteger('pre_precio_sugerido')->nullable();
    // $table->date('pre_fecha_compra');
    // $table->unsignedInteger('pre_veces_alquilado')->default(0);

    public function rules()
    {
      switch ($this->method()) {
        case 'POST':
          return [
            'nombre' => 'string|required|max:50',
            'descripcion' => 'string|required|max:255',
            'cantidad' => 'numeric|required',
            'precio' => 'numeric|nullable',
            'fecha' => 'date|required',
            'talla' => ['required',Rule::in(['XS','S','M','L','XL','XXL'])],
            'categoria' => ['required','exists:categoria,pk_categoria'],
            'palabrasclave' => ['required','regex:/^([a-zA-Z]+;?){0,25}$/']
          ];

        case 'PUT':
        case 'PATCH':
          return [
            '',
          ];

        default:
          break;
      }
    }
}
