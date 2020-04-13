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

Route::get('/main', function () {
    return view('contenido/contenido');
})->name('main');

Route::get('/categoria','CategoriaController@index');
Route::get('/categoria/selectcategoria','CategoriaController@selectCategoria');
Route::post('/categoria/registrar','CategoriaController@store');
Route::put('/categoria/actualizar','CategoriaController@update');
Route::put('/categoria/desactivar','CategoriaController@desactivar');
Route::put('/categoria/activar','CategoriaController@activar');

Route::get('/lote','LoteController@index');
Route::get('/lote/selectLote','LoteController@selectLote');
Route::post('/lote/registrar','LoteController@store');
Route::put('/lote/actualizar','LoteController@update');
Route::put('/lote/desactivar','LoteController@desactivar');
Route::put('/lote/activar','LoteController@activar');

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
Route::get('/productov','ProductovController@index');
Route::get('/productov/buscar/{number}','ProductovController@buscar');
// Route::get('/departamentos/provincias/{number}','DepartamentosController@provincias');

Route::post('/producto/registrar','ProductoController@store');
Route::put('/producto/actualizar','ProductoController@update');
Route::put('/producto/desactivar','ProductoController@desactivar');
Route::put('/producto/activar','ProductoController@activar');

Route::get('/proveedor','ProveedorController@index');
Route::post('/proveedor/registrar','ProveedorController@store');
Route::put('/proveedor/actualizar','ProveedorController@update');
Route::put('/proveedor/desactivar','ProveedorController@desactivar');
Route::put('/proveedor/activar','ProveedorController@activar');
Route::get('/proveedor/selectProveedor','ProveedorController@selectProveedor');


Route::get('/usuario','UsuarioController@index');
Route::post('/usuario/registrar','UsuarioController@store');
Route::put('/usuario/actualizar','UsuarioController@update');
Route::put('/usuario/desactivar','UsuarioController@desactivar');
Route::put('/usuario/activar','UsuarioController@activar');

Route::get('/cliente','ClienteController@index');
Route::get('/clienteb/{num}','ClienteController@repetido');
Route::post('/cliente/registrar','ClienteController@store');
Route::put('/cliente/actualizar','ClienteController@update');
Route::put('/cliente/desactivar','ClienteController@desactivar');
Route::put('/cliente/activar','ClienteController@activar');
Route::get('/cliente/activar','ClienteController@activar');

// para buscar con dni o ruc
Route::get('/service','ServiceController@index');
Route::get('/service/ruc/{number}','ServiceController@ruc');
Route::get('/service/dni/{number}','ServiceController@dni');

//Para llenar departamentos, provincias y distritos a clientes y proveedores
Route::get('/departamentos','DepartamentosController@index');
Route::get('/gdepartamentos','DepartamentosController@departamentos');
Route::get('/departamentos/provincias/{number}','DepartamentosController@provincias');
Route::get('/departamentos/distritos/{number}','DepartamentosController@distritos');

Route::get('/','Auth\LoginController@showLoginForm');
Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
