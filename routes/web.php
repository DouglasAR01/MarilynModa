<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Rutas del autenticado
 * NO TOCAR
 * El formulario de registro está deshabilitado, la forma de registrar es mediante
 * el controlador de empleados y solo el administrador puede hacerlo.
 * @author Douglas R
 */
Auth::routes(['register' => false]);

/**
 * Miscelanea
 */
Route::get('catalogo','CatalogoController@index');
Route::get('/', function (){
  return view('pages.index');
});
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Empleado
 * @author Douglas R
 */
Route::resource('/empleados','EmpleadoController');

/**
* Prenda
* @author Douglas R
*/
//Route::get('/prendas/categorias/{pk_categoria}','PrendaController@metodo');
//Route::get('/prendas/filtrado','PrendaController@metodo');
Route::post('/prendas/eliminarFoto','PrendaController@eliminarFoto')->name('prendas.eliminarFoto');
Route::resource('/prendas','PrendaController');

/**
* Baja
* @author Douglas R
*/
// Route::resource('/bajas','BajaController')->except('index','show');
// Route::get('/bajas/{pk_categoria}','BajaController@metodo');
// Route::get('/bajas/ver/{pk_baja}','BajaController@show');

/**
 * Categoria
 * @author Douglas R
 */
Route::resource('/categorias','CategoriaController');

/**
 * Cliente
 * @author Douglas R
 */
// Route::get('/clientes/{pk_cli_cedula}/facturas','ClienteController@metodo'); //Sujeto a cambios
// Route::get('/clientes/{pk_cli_cedula}/facturas/{estado}','ClienteController@metodo'); //Sujeto a cambios
// Route::resource('/clientes','ClienteController');

/**
 * Factura
 * @author Douglas R
 */
// Route::get('/facturas/{pk_emp_cedula}','FacturaController@index'); //Parametro puede ser null
// Route::get('/facturas/ver/{pk_factura}','FacturaController@show');
// Route::resource('/facturas','FacturaController')->except('index','show');

/**
 * Gasto
 * @author Douglas R
 */
// Route::get('/gastos/{pk_emp_cedula}','GastoController@index'); //Parametro puede ser null
// Route::get('/gastos/ver/{pk_emp_cedula}','GastoController@show');
// Route::resource('/gastos','GastoController')->except('index','show');

/**
 * Panel de control
 * @author Douglas R
 */
Route::get('/panel','PanelControlController@index')->name('panelcontrol.index');
Route::post('/panel','PanelControlController@create')->name('panelcontrol.create');

/**
 * Foto de prenda
 * @author Douglas R
 */
Route::get('/prendas/{pk_prenda}/fotos','FotoPrendaController@edit')->name('fotoprenda.edit');
Route::put('/prendas/{pk_prenda}/fotos','FotoPrendaController@update')->name('fotoprenda.update');
Route::delete('/prendas/fotos/eliminar','FotoPrendaController@destroy')->name('fotoprenda.destroy');
