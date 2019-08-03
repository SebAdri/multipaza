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

//Login y Logout
Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::get('logout', 'Auth\LoginController@logout');

//REST Categorias
Route::resource('/administrador/categorias', 'CategoriaController');

//REST SubCategorias
Route::resource('/administrador/subcategorias', 'SubCategoriaController');

//REST Locales
Route::resource('/administrador/locales', 'LocalesController');

//REST Palabras Claves
Route::resource('/administrador/palabrasClaves', 'PalabrasClavesController');

//REST Palabras Claves
Route::resource('/administrador/configuraciones', 'ConfiguracionesController');

//REST Palabras Claves
Route::resource('/administrador/roles', 'RolController');

//REST Palabras Claves
Route::resource('/administrador/usuarios', 'UserController');

Auth::routes();

Route::get('/administrador', 'HomeController@index')->name('home');
Route::get('home', ['as' => 'home', 'uses'=>'HomeController@index']);




Route::get('/', 'PrincipalController@inicio');
Route::get('/categoria', 'PrincipalController@categorias');
Route::get('/categoria/{id}', 'PrincipalController@subcategorias');
