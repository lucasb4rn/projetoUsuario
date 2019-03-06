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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/usuarios', 'UsuarioController@listaUsuarios');
Route::get('/usuarios/mostra/{id}', 'UsuarioController@mostra');
Route::get('/usuarios/novo', 'UsuarioController@novo');
Route::post('/usuarios/adiciona', 'UsuarioController@adiciona');
Route::get('/usuarios/remove/{id}', 'UsuarioController@remove');
Route::any('usuarios/pesquisar','UsuarioController@pesquisar');
Route::get('usuarios/alterar/{id}','UsuarioController@mostraAlterar');
Route::post('usuarios/alterar/{id}','UsuarioController@alterar');
Route::get('/profile','ProfileController@showProfile');

//Route::any('/home', 'HomeController@index');



Route::get('usuarios/login', 'LoginController@form');
Route::post('usuarios/login', 'LoginController@login');



Auth::routes();

