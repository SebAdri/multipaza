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

Route::get('home', ['as' => 'home', 'uses'=>'HomeController@index']);





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

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/', 'PrincipalController@inicio');
Route::get('/Categorias', 'PrincipalController@categorias');
Route::get('/subcategoria/{id}', 'PrincipalController@subcategorias');
Route::get('/locales/{id}/{di}', 'PrincipalController@locales');
// Route::post('filtros', 'PrincipalController@filtros');
Route::post('filtros', ['as' => 'filtros', 'uses'=>'PrincipalController@filtros']);
Route::get('buscar', ['as' => 'buscar', 'uses' => 'PrincipalController@buscar']);
Route::get('getLocalesPalabras', ['as' => 'getLocalesPalabras', 'uses' => 'PrincipalController@getLocalesPalabras']);

//imports
Route::get('/import', 'UserController@import');

Route::get('/importCategorias', 'CategoriaController@import');
Route::get('/importSubCategorias', 'SubCategoriaController@import');
Route::get('/importLocales', 'LocalesController@import');
Route::get('/importPalabras', 'PalabrasClavesController@importPalabras');

Route::get('/importLocalesPivot', 'LocalesController@importPivot');
Route::get('/importPalabrasPivot', 'PalabrasClavesController@importPalabrasPivot');