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


Route::resource('/', 'InicioController');

Route::resource('/articulo', 'ArticuloController');
Route::resource('/usuario/perfil', 'PerfilController');
Route::resource('/detalle', 'DetalleController');
Route::resource('/marca', 'MarcaController');
Route::resource('/precio', 'PrecioController');
Route::resource('/proveedor', 'ProveedorController');
Route::resource('/provmarc', 'ProvmarcController');
Route::resource('/usuario', 'UsuarioController');

Route::post('/articulo/dropzone', 'ArticuloController@dropzone');
//rutas reportes
//Usuarios
Route::get('/reporte', 'UsuarioController@reporte'); 
Route::get('descargar-usuarios', 'UsuarioController@pdf')->name('usuarios.pdf');
Route::get('/reporteac', 'UsuarioController@reporteac'); 
Route::get('descargar-usuarios-ac', 'UsuarioController@pdfac')->name('usuariosac.pdf');
Route::get('/reportein', 'UsuarioController@reportein'); 
Route::get('descargar-usuarios-in', 'UsuarioController@pdfin')->name('usuariosin.pdf');
//proveedor
Route::get('/reportepr', 'ProveedorController@reporte'); 
Route::get('descargar-proveedores', 'ProveedorController@pdf')->name('proveedor.pdf');
Route::get('/reporteacpr', 'ProveedorController@reporteac'); 
Route::get('descargar-usuarios-ac', 'ProveedorController@pdfac')->name('proveedorac.pdf');
Route::get('/reporteinpr', 'ProveedorController@reportein'); 
Route::get('descargar-proveedores-in', 'ProveedorController@pdfin')->name('proveedorin.pdf');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
