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

Route::get('/', function () {
    return view('contenido/contenido');
});
Route::get('/categoria','CategoriaController@index');
Route::get('/categoria/selectcategoria','CategoriaController@selectCategoria');
Route::post('/categoria/registrar','CategoriaController@store');
Route::put('/categoria/actualizar','CategoriaController@update');
Route::put('/categoria/desactivar','CategoriaController@desactivar');
Route::put('/categoria/activar','CategoriaController@activar');

Route::get('/marca','MarcaController@index');
Route::get('/marca/selectmarca','MarcaController@selectMarca');
Route::post('/marca/registrar','MarcaController@store');
Route::put('/marca/actualizar','MarcaController@update');
Route::put('/marca/desactivar','MarcaController@desactivar');
Route::put('/marca/activar','MarcaController@activar');

Route::get('/tipo','TipoController@index');
Route::get('/tipo/selecttipo','TipoController@selectTipo');
Route::post('/tipo/registrar','TipoController@store');
Route::put('/tipo/actualizar','TipoController@update');
Route::put('/tipo/desactivar','TipoController@desactivar');
Route::put('/tipo/activar','TipoController@activar');

Route::get('/unidad','UnidadController@index');
Route::get('/unidad/selectunidad','UnidadController@selectUnidad');
Route::post('/unidad/registrar','UnidadController@store');
Route::put('/unidad/actualizar','UnidadController@update');
Route::put('/unidad/desactivar','UnidadController@desactivar');
Route::put('/unidad/activar','UnidadController@activar');

Route::get('/producto','ProductoController@index');
Route::post('/producto/registrar','ProductoController@store');
Route::put('/producto/actualizar','ProductoController@update');
Route::put('/producto/desactivar','ProductoController@desactivar');
Route::put('/producto/activar','ProductoController@activar');

Route::get('/proveedor','ProveedorController@index');
Route::post('/proveedor/registrar','ProveedorController@store');
Route::put('/proveedor/actualizar','ProveedorController@update');
Route::put('/proveedor/desactivar','ProveedorController@desactivar');
Route::put('/proveedor/activar','ProveedorController@activar');
