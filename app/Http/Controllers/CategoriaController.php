<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Session;

class CategoriaController extends Controller
{
    function __construct(){
      $this->middleware('entran:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorias.indexCategorias',[
          'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.crearCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaCategoria = new Categoria();
        $nuevaCategoria->cat_nombre = $request->nombre;
        $nuevaCategoria->cat_descripcion = $request->descripcion;
        $nuevaCategoria->cat_tipo = $request->tipo;
        if (!$nuevaCategoria->save()) {
          $request->session()->flash('error', 'Categoria no guardada');
          return redirect()->route('categorias.index');
        }
        $request->session()->flash('success', 'Categoria creada correctamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
          $request->session()->flash('error', 'Categoria no encontrada');
          return redirect()->route('categorias.index');
        }
        return view('categorias.verCategoria',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      $categoria = Categoria::find($id);
      if (!$categoria) {
        $request->session()->flash('error', 'Categoria no encontrada');
        return redirect()->route('categorias.index');
      }
      return view('categorias.editarCategoria',compact('categoria'));
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
        $categoria = Categoria::findOrFail($id);
        $categoria->cat_nombre = $request->nombre;
        $categoria->cat_descripcion = $request->descripcion;
        $categoria->cat_tipo = $request->tipo;
        if (!$categoria->save()) {
          $request->session()->flash('error', 'Error al modificar la categoria');
          return redirect()->route('categorias.index');
        }
        $request->session()->flash('success','Categoria editada correctamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        $request->session()->flash('success', 'Categoria eliminada');
        return redirect()->route('categorias.index');
    }
}
