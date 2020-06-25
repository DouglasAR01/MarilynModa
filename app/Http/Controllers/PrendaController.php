<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;
use App\Categoria;
use App\FotoPrenda;
use App\Http\Requests\PrendaRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupraController as SC;
use Session;

class PrendaController extends Controller
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
      // dd( Prenda::all());
        return view('prendas.indexPrendas', [
          'currentRouteName' => Route::currentRouteName(),
          'prendas' => Prenda::simplePaginate(20)
        ]);
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
    public function store(PrendaRequest $request)
    {
        // Creación de la prenda
        $nuevaPrenda = new Prenda();
        $nuevaPrenda->pre_fk_categoria = $request->categoria;
        $nuevaPrenda->pre_visible = $request->filled('visible');
        $nuevaPrenda->pre_nombre = $request->nombre;
        $nuevaPrenda->pre_descripcion = $request->descripcion;
        $nuevaPrenda->pre_cantidad = $request->cantidad;
        $nuevaPrenda->pre_precio_sugerido = $request->precio;
        $nuevaPrenda->pre_fecha_compra = $request->fecha;
        $nuevaPrenda->pre_talla = $request->talla;
        if (!$nuevaPrenda->save()) {
          Session::flash('error', 'Prenda no guardada');
          return redirect()->route('prendas.index');
        }

        // Asignación de las palabras clave
        $nuevaPrenda->asociarPalabrasClave($request->palabrasclave);

        Session::flash('success', 'Prenda creada con exito.');
        return redirect()->route('fotoprenda.edit',$nuevaPrenda->pk_prenda);
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
          Session::flash('error', 'Prenda no encontrada');
          return redirect()->route('prendas.index');
        }
        //Si no es un empleado y la prenda no es visible al publico, retrocede
        if (empty(auth(session('cargo'))->user()) && $prenda->pre_visible==false) {
          Session::flash('error', 'Prenda no disponible');
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
        $categorias = Categoria::all()->where('cat_tipo','a');
        return view('prendas.editarPrenda',['categorias' => $categorias,'prenda' => $prenda]);
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
        $prendaActualizada= Prenda::find($id);
        $prendaActualizada->pre_fk_categoria = $request->categoria;
        $prendaActualizada->pre_visible = $request->filled('visible');
        $prendaActualizada->pre_nombre = $request->nombre;
        $prendaActualizada->pre_descripcion = $request->descripcion;
        $prendaActualizada->pre_cantidad = $request->cantidad;
        $prendaActualizada->pre_precio_sugerido = $request->precio;
        $prendaActualizada->pre_fecha_compra = $request->fecha;
        $prendaActualizada->pre_talla = $request->talla;
        if (!$prendaActualizada->save()) {
          Session::flash('error', 'Prenda no disponible');
          return redirect()->route('prendas.index');
        }

        // Asignación de las palabras clave
        $prendaActualizada->asociarPalabrasClave($request->palabrasclave);
        Session::flash('success', 'Prenda actualizada con éxito');
        return redirect()->route('prendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prenda $prenda)
    {
        $fotosPrenda = $prenda->fotos;
        $prenda->delete();
        foreach ($fotosPrenda as $foto) {
          $foto->delete();
          $foto->eliminarFoto();
        }
        Session::flash('success', 'Prenda eliminada');
        return redirect()->route('prendas.index');
    }
}
