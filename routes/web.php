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

Route::prefix('produtos')->group(function () {
    Route::get('/', 'ProdutosController@index');
    Route::get('/add', 'ProdutosController@add');
    Route::post('/create', 'ProdutosController@create');
    Route::get('/edit/{id}', 'ProdutosController@edit');
    Route::post('/update/{id}', 'ProdutosController@update');
    Route::get('/delete/{id}', 'ProdutosController@destroy');
});
