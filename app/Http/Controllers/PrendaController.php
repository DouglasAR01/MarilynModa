<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;
use App\Categoria;
use App\FotoPrenda;
use App\Http\Controllers\SupraController as SC;
use App\Http\Requests\PrendaRequest;

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
    public function store(PrendaRequest $request)
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
      $prendaActualizada->pre_visible = $request->visible; //verificar que sea booleano
      $prendaActualizada->pre_nombre = $request->nombre;
      $prendaActualizada->pre_descripcion = $request->descripcion;
      $prendaActualizada->pre_cantidad = $request->cantidad;
      $prendaActualizada->pre_precio_sugerido = $request->precio;
      $prendaActualizada->pre_fecha_compra = $request->fecha;
      $prendaActualizada->pre_talla = $request->talla;
      if (!$prendaActualizada->save()) {
        return 'Error al guardar la prenda';
      }


      // foreach ($request->fotos as $llave => $foto) {
      //   if(!empty($foto)){
      //     $linkFotoSubida = $request->fotos[$llave]->store('prendas','public');
      //     if (!$linkFotoSubida) {
      //       return 'Error al guardar la foto';
      //     }
      //     $fotoACambiar= FotoPrenda::where('fop_link',$request->links[$llave])->first();
      //     //dd($fotoACambiar);
      //     $fotoACambiar->cambiarLinkFoto($linkFotoSubida);
      //
      //   }
      // }


      $fotoPrendaPrincipalActual = FotoPrenda::where([
        ['fop_link', $prendaActualizada->getFotoPrincipal()],
        ['fop_principal', 1]
        ])->first();

      if (!$fotoPrendaPrincipalActual->cambiarFotoPrincipal($request->fotoPrincipal)) {
        return 'No se pudo Cambiar Foto Principal';
      }



        return 'actualizado';
    }

    /** Funciones para Actualizar una Prenda
    */



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
