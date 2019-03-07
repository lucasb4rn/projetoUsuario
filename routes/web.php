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

Route::get('/', 'UsuarioController@listaUsuarios');
Route::get('/usuarios', 'UsuarioController@listaUsuarios');
Route::get('/usuarios/detalheUsuario/{id}', 'UsuarioController@detalheUsuario');
Route::get('/usuarios/cadastroUsuario', 'UsuarioController@cadastroUsuario');
Route::post('/usuarios/adicionaUsuario', 'UsuarioController@adicionaUsuario');
Route::get('/usuarios/remove/{id}', 'UsuarioController@remove');
Route::any('usuarios/pesquisa','UsuarioController@pesquisa');
Route::get('usuarios/alteraUsuario/{id}','UsuarioController@carregaInformacoesDoUsuarioParaAlterar');
Route::post('usuarios/alteraUsuario/{id}','UsuarioController@alteraUsuario');
Route::get('/profileUsuario','ProfileController@showProfile');

//Route::any('/home', 'HomeController@index');



Route::get('usuarios/login', 'LoginController@form');
Route::post('usuarios/login', 'LoginController@login');



Auth::routes();

