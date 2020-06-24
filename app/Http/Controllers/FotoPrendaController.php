<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupraController as SC;
use App\Prenda;
use App\FotoPrenda;
use Session;

class FotoPrendaController extends Controller
{

    function __construct()
    {
        $this->middleware('entran:admin,gerente')->except(['destroy']);
        $this->middleware('entran:admin')->only('destroy');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_prenda)
    {
        $prenda = Prenda::find($pk_prenda);
        return view('fotoPrendas.modificarFotos',['prenda' => $prenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pk_prenda)
    {
        $prenda = Prenda::find($pk_prenda);
        // Bandera que por defecto asume que no hay foto principal asignada
        // False = NO HAY FOTO PRINCIPAL ASIGNADA
        // True = SÍ HAY FOTO PRINCIPAL ASIGNADA
        $banderaFotoPrincipal = false;
        if(!empty($request->fotoPrincipal)){
          $fotoPrendaPrincipalActual = $prenda->getFotoPrincipal();
          if (!($fotoPrendaPrincipalActual->fop_link===$request->fotoPrincipal)) {
            // Cambia la foto principal si la foto principal asignada no es la misma
            // asignada anteriormente.
            if (!$fotoPrendaPrincipalActual->cambiarFotoPrincipal($request->fotoPrincipal)) {
              Session::flash('error', 'No se pudo cambiar la foto principal');
              return redirect()->route('prendas.index');
            }
          }
          // Si hay foto principal asignada, por lo tanto, modifica la bandera
          $banderaFotoPrincipal = true;
        }

        //Cambia las demás fotos (incluída la principal) si se subió un archivo
        if (!empty($request->fotos)) {
          foreach ($request->fotos as $llave => $foto) {
            if(!empty($foto)){
              $fotoACambiar= FotoPrenda::find($request->links[$llave]);
              $linkFotoSubida = $foto->store('prendas','public');
              if (!$linkFotoSubida) {
                return 'Error al guardar la foto';
              }
              //Si la foto no existía antes, crea una nueva
              if (empty($fotoACambiar)) {
                FotoPrenda::create([
                  'fop_fk_prenda' => $prenda->pk_prenda,
                  'fop_link' => $linkFotoSubida,
                  // Si no había foto principal asignada, la primera foto se asigna
                  'fop_principal' => ($banderaFotoPrincipal) ? false : true
                ]);
                $banderaFotoPrincipal = true;
              }else{
                $fotoACambiar->cambiarLinkFoto($linkFotoSubida);
              }
              $this->optimizar($linkFotoSubida);
            }
          }
        }
        Session::flash('success', 'Fotos actualizadas con éxito.');
        return redirect()->route('prendas.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $foto = FotoPrenda::find($request->id);
        if(!empty($foto)){
          $foto->delete();
          $foto->eliminarFoto();
        }
        return back();
    }

    private function optimizacionActivada()
    {
        return config('services.tinypng.on');
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
