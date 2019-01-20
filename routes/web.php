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
Route::get('catalogo', 'PagesController@getCatalogo');
Route::get('/', 'PagesController@getIndex');
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
Route::get('/prendas/categorias/{pk_categoria}','PrendaController@metodo');
Route::get('/prendas/filtrado','PrendaController@metodo');
Route::resource('/prendas','PrendaController');

/**
* Baja
* @author Douglas R
*/
Route::resource('/bajas','BajaController')->except('index','show');
Route::get('/bajas/{pk_categoria}','BajaController@metodo');
Route::get('/bajas/ver/{pk_baja}','BajaController@show');

/**
 * Categoria
 * @author Douglas R
 */
Route::resource('/categorias','CategoriasController');

/**
 * Cliente
 * @author Douglas R
 */
Route::get('/clientes/{pk_cli_cedula}/facturas','ClienteController@metodo'); //Sujeto a cambios
Route::get('/clientes/{pk_cli_cedula}/facturas/{estado}','ClienteController@metodo'); //Sujeto a cambios
Route::resource('/clientes','ClienteController');

/**
 * Factura
 * @author Douglas R
 */
Route::get('/facturas/{pk_emp_cedula}','FacturaController@index'); //Parametro puede ser null
Route::get('/facturas/ver/{pk_factura}','FacturaController@show');
Route::resource('/facturas','FacturaController')->except('index','show');

/**
 * Gasto
 * @author Douglas R
 */
Route::get('/gastos/{pk_emp_cedula}','GastoController@index'); //Parametro puede ser null
Route::get('/gastos/ver/{pk_emp_cedula}','GastoController@show');
Route::resource('/gastos','GastoController')->except('index','show');

/**
 * Panel de control
 * @author Douglas R
 */
Route::resource('/control','PanelControlController');

/**
 * Foto de prenda
 * @author Douglas R
 */
Route::resource('/fotosprenda','FotoPrendaController');

/**
 * Palabra clave
 * @author Douglas R
 */
Route::resource('/palabrasclave','PalabraClaveController');
