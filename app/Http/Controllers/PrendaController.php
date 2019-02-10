<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;
use App\Categoria;
use App\FotoPrenda;
use App\Http\Controllers\SupraController as SC;
use App\Http\Requests\PrendaRequest;
use Illuminate\Support\Facades\Route;

class PrendaController extends Controller
{
    protected $optimizacionActivada;

    function __construct()
    {
        $this->middleware('entran:admin,gerente,empleado')
             ->only(['index']);
        $this->middleware('entran:admin,gerente')->except(['index','show','destroy']);
        $this->middleware('entran:admin')->only('destroy');
        $this->optimizacionActivada = 1;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prendas.indexPrendas', [
          'currentRouteName' => Route::currentRouteName(),
          'prendas' => Prenda::all()
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
        $nuevaPrenda = new Prenda();
        $nuevaPrenda->pre_fk_categoria = $request->categoria;
        $nuevaPrenda->pre_visible = SC::chequearBooleano($request->pre_visible);
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
        $this->optimizar($linkFotoSubida);
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
        $prendaActualizada->pre_visible = SC::chequearBooleano($request->pre_visible);
        $prendaActualizada->pre_nombre = $request->nombre;
        $prendaActualizada->pre_descripcion = $request->descripcion;
        $prendaActualizada->pre_cantidad = $request->cantidad;
        $prendaActualizada->pre_precio_sugerido = $request->precio;
        $prendaActualizada->pre_fecha_compra = $request->fecha;
        $prendaActualizada->pre_talla = $request->talla;
        if (!$prendaActualizada->save()) {
          return 'Error al guardar la prenda';
        }
        //Cambia la foto principal
        $fotoPrendaPrincipalActual = $prendaActualizada->getFotoPrincipal();
        if (!($fotoPrendaPrincipalActual->fop_link===$request->fotoPrincipal)) {
          if (!$fotoPrendaPrincipalActual->cambiarFotoPrincipal($request->fotoPrincipal)) {
            return 'No se pudo cambiar la foto principal';
          }
        }

        //Cambia las demás fotos (incluída la principal) si se subió un archivo
        foreach ($request->fotos as $llave => $foto) {
          if(!empty($foto)){
            $linkFotoSubida = $request->fotos[$llave]->store('prendas','public');
            if (!$linkFotoSubida) {
              return 'Error al guardar la foto';
            }
            $fotoACambiar= FotoPrenda::find($request->links[$llave]);
            $fotoACambiar->cambiarLinkFoto($linkFotoSubida);
            $this->optimizar($fotoACambiar->fop_link);
          }
        }
        return 'Prenda actualizada con éxito';
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

    private function optimizacionActivada()
    {
        return $this->optimizacionActivada;
    }

    private function optimizarImagen(String $imagen)
    {
        \Tinify\setKey(config('services.tinypng.key'));
        $source = \Tinify\fromFile(SC::obtenerArchivo($imagen,'public'));
        $source->toFile(SC::obtenerArchivo($imagen,'public'));
    }

    private function optimizar(String $imagen)
    {
        if ($this->optimizacionActivada()) {
          $this->optimizarImagen($imagen);
        }
    }
}
