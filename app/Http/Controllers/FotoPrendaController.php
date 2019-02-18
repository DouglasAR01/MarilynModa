<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prenda;
use App\Http\Controllers\SupraController as SC;
use App\FotoPrenda;

class FotoPrendaController extends Controller
{

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
        //Cambia la foto principal
        $fotoPrendaPrincipalActual = $prenda->getFotoPrincipal();
        if (!($fotoPrendaPrincipalActual->fop_link===$request->fotoPrincipal)) {
          if (!$fotoPrendaPrincipalActual->cambiarFotoPrincipal($request->fotoPrincipal)) {
            Session::flash('error', 'No se pudo cambiar la foto principal');
            return redirect()->route('prendas.index');
            // return 'No se pudo cambiar la foto principal';
          }
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
                  'fop_principal' => false
                ]);
              }else{
                $fotoACambiar->cambiarLinkFoto($linkFotoSubida);
              }
              $this->optimizar($linkFotoSubida);
            }
          }
        }
        //Session::flash('success', 'Fotos actualizadas con éxito');
        return redirect()->route('prendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pk_prenda)
    {
        $foto = FotoPrenda::find($pk_prenda);
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
