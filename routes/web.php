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
    return view('welcome');
});

Route::get('/produtos', 'ProdutosController@index');
Route::get('/produtos/add', 'ProdutosController@add');
Route::post('/produtos/create', 'ProdutosController@create');
Route::get('/produtos/edit/{id}', 'ProdutosController@edit');
Route::post('/produtos/update/{id}', 'ProdutosController@update');
Route::get('/produtos/delete/{id}', 'ProdutosController@destroy');
