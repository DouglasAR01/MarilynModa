<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;
use App\Categoria;
use App\FotoPrenda;
use App\Http\Controllers\SupraController as SC;

class prendaController extends Controller
{

    function __construct()
    {
        $this->middleware('entran:admin,gerente,empleado')
             ->only(['index']);
        $this->middleware('entran:admin,gerente')->except(['index','show','destroy']);
        $this->middleware('entran:admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prendas.indexPrendas', ['prendas' => Prenda::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->where('cat_tipo','a');
        return view('prendas.crearPrenda',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaPrenda = new Prenda();
        $nuevaPrenda->pre_fk_categoria = $request->categoria;
        $nuevaPrenda->pre_visible = $request->visible; //verificar que sea booleano
        $nuevaPrenda->pre_nombre = $request->nombre;
        $nuevaPrenda->pre_descripcion = $request->descripcion;
        $nuevaPrenda->pre_cantidad = $request->cantidad;
        $nuevaPrenda->pre_precio_sugerido = $request->precio;
        $nuevaPrenda->pre_fecha_compra = $request->fecha;
        $nuevaPrenda->pre_talla = $request->talla;
        if (!$nuevaPrenda->save()) {
          return 'Error al guardar la prenda';
        }
        $linkFotoSubida = SC::subirArchivo($request,'foto','prendas');
        if (!$linkFotoSubida) {
          return 'Error al guardar la foto';
        }
        FotoPrenda::create([
          'fop_fk_prenda' => $nuevaPrenda->pk_prenda,
          'fop_link' => $linkFotoSubida,
          'fop_principal' => true
        ]);
        return 'Prenda guardada con exito';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prenda = Prenda::find($id);
        if (!$prenda) {
          return 'Prenda no encontrada';
        }
        //Si no es un empleado y la prenda no es visible al publico, retrocede
        if (empty(auth(session('cargo'))->user()) && $prenda->pre_visible==false) {
          return back();
        }
        return view('prendas.verPrenda',compact('prenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prenda $prenda)
    {
        return view('prendas.editarPrenda',compact('prenda'));
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
        return 'actualizado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prenda $prenda)
    {
        $prenda->delete();
        return 'eliminado';
    }
}
