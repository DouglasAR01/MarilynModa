<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * SUPRACONTROLLER
 * @author Douglas R
 * Esta clase provee métodos que pueden ser comunes a todas las clases.
 * Esta clase no hereda de ninguna otra clase, por lo tanto, solo tiene los métodos
 * aquí presentes.
 * Cada método debe de estar debidamente documentado y debe de tener el/los autores.
 * @version 1.1
 */
class SupraController
{
  /**
   * Este método es similar a un array_push, sin embargo, funciona con llaves, es decir,
   * funciona con diccionarios.
   * @param $llave
   * Es la llave del diccionario con la que se llamará la fila. ej: ['LLAVE' => (...)]
   * @param array $array
   * DEBE ser un array, es el vector al cual se le quiere asignar contenido.
   * @param $contenido
   * Es el contenido al que se le asignará a la llave. Puede ser un array.
   * @author Douglas R
   * @version 1.2
   */
  public static function array_push_wKey($llave,$array,$contenido)
  {
    //Si no existe la llave en el array, la crea y le asigna el contenido
    if (!array_key_exists($llave,$array)) {
      if (is_array($contenido)) {
        $array[$llave] = $contenido;
      }else{
        $array[$llave] = array($contenido);
      }
    }else{
      //Si existe la llave, lo que hace es meterle el contenido nuevo.
      array_push($array[$llave],$contenido);
    }
    return $array;
  }

  /**
   * Método que sirve para comprobar, al actualizar los datos de una fila, que no exista otra fila con
   * la misma PK, por lo tanto, genere problemas de sobrescritura o errores de integridad en la BD.
   * @param $pk_futura
   * Es la clave primaria que se quiere asignar.
   * @param $pk_original
   * Es la clave primaria que ya está asignada.
   * @param class $Modelo
   * Es el modelo (NO EL OBJETO). Para enviar una clase como parámetro se usa Nombre::class.
   * @return 0 si NO se repite la PK, 1 en caso contrario.
   * @author Douglas R
   * @version 1.5
   */
  public static function comprobarRepeticion($pk_futura, $pk_original, $Modelo){
    if($pk_futura!=$pk_original){
      $query = $Modelo::find($pk_futura);
      if(empty($query)){
        return 0;
      }
      return 1;
    }
    return 0;
  }

  /**
   * Este método se encarga de subir archivos al directorio presente dentro de
   * la carpeta pública.
   * @param Request $request
   * @param String $nombreInput
   * Es el nombre del input que contiene el archivo a subir
   * @param String $directorio
   * Es el nombre de la subcarpeta a la que se guardará, NO puede ser nulo
   * @return $ruta retorna la ruta en la que se guardó el archivo.
   * @author Douglas R
   * @version 2.0
   */
  public static function subirArchivo(
    Request $request,
    String $nombreInput,
    String $directorio
  ){
    $ruta = $request->file($nombreInput)->store($directorio,'public');
    return $ruta;
  }

  /**
   * Este método se encarga de chequear que la variable que se le envía sea un booleano.
   * La forma en la que realiza la opreación es verificando que la variable contenga algo,
   * en caso de contener algo, se asume que es una variable de tipo booleano y devolverá true.
   * @author Douglas R.
   * @param $var Variable a verificar que sea booleano, lógicamente, se debería envíar un booleano.
   * @version 1.0
   */
  public static function chequearBooleano($var)
  {
      if ($var) {
        return 1;
      }
      return 0;
  }

  /**
   * Este método elimina el archivo solicitado de alguno de los discos
   * @author Douglas R.
   * @param String $archivo Es la ruta JUNTO con el nombre del archivo, ejemplo:
   * 'ruta/rutita/nombreArchivo.txt'
   * @param String $disco Es el disco del filesystem de Laravel.
   * @version 0.5
   */
  public static function eliminarArchivo(String $archivo, String $disco)
  {
      Storage::disk($disco)->delete($archivo);
  }

  /**
   * Este método devuelve la ruta hacia el archivo solicitado
   * @author Douglas R.
   * @param String $archivo Es la ruta JUNTO con el nombre del archivo, ejemplo:
   * 'ruta/rutita/nombreArchivo.txt'
   * @param String $disco Es el disco del filesystem de Laravel.
   * @version 0.5
   */
  public static function obtenerArchivo(String $archivo, String $disco)
  {
      return Storage::disk($disco)->path($archivo);
  }
}
