<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;

class prendaController extends Controller
{

    function __construct()
    {
      $this->middleware('entran:admin,gerente,empleado')->
        except(['create','store','destroy']);
      $this->middleware('entran:admin')->only(['create','store','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $prendas= Prenda::all();
      return view('prendas.indexPrendas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('prendas.crearPrenda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'Guardado';
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
      return view(prendas.verPrenda,compact('prenda'));
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
