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
Route::get('/usuario/reporte', 'UsuarioController@reporte');
Route::get('descargar-usuarios', 'UsuarioController@pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
