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
Auth::routes();


Route::middleware(['auth'])->group(function () {
        Route::put('usuario/update/{id}', ['as' => 'usuario.update', 'uses' => 'UsuarioController@update']);
        Route::get('usuario/edit/{id}', ['as' => 'usuario.edit', 'uses' => 'UsuarioController@edit']);
        Route::get('usuario/destroy/{id}', ['as' => 'usuario.destroy', 'uses'=> 'UsuarioController@destroy']);
        Route::get('usuario', 'UsuarioController@index');

});
Route::get('usuario/create', ['as' => 'usuario.create', 'uses' => 'UsuarioController@create']);
Route::post('usuario/store', ['as' => 'usuario.store', 'uses'=> 'UsuarioController@store']);

Route::middleware(['auth'])->group(function () {
Route::get('publicacoes/controle', ['as' => 'publicacoes.controle', 'uses' => 'PublicacaoController@controle']);
Route::get('publicacao/create', ['as' => 'publicacao.create', 'uses' => 'PublicacaoController@create']);
Route::get('publicacao/edit/{id}', ['as' => 'publicacao.edit', 'uses' => 'PublicacaoController@edit']);
Route::put('publicacao/update/{id}', ['as' => 'publicacao.update', 'uses' => 'PublicacaoController@update']);
Route::post('publicacao/store', ['as' => 'publicacao.store', 'uses' => 'PublicacaoController@store']);
Route::get('publicacao/destroy/{id}', ['as' => 'publicacao.destroy', 'uses' => 'PublicacaoController@destroy']);
Route::get('excluir/arquivo/{name}', 'PublicacaoController@deletfile')->name('excluir.arquivo');
Route::get('publicacao/{publicacao}/download', 'PublicacaoController@download');


});

Route::get('/home', ['as' => 'publicacao.home', 'uses' => 'PublicacaoController@home']);
Route::get('/', ['as' => 'publicacao.index', 'uses' => 'PublicacaoController@index']);

Route::get('publicacao', 'PublicacaoController@index');
Route::get('publicacoes/categorias', ['as' => 'publicacao.categorias', 'uses' => 'PublicacaoController@categorias']);
Route::get('publicacoes/gravuras', ['as' => 'publicacoes.gravuras', 'uses' => 'PublicacaoController@gravuras']);
Route::get('publicacoes/pinturas', ['as' => 'publicacoes.pinturas', 'uses' => 'PublicacaoController@pinturas']);
Route::get('publicacoes/livros', ['as' => 'publicacoes.livros', 'uses' => 'PublicacaoController@livros']);
