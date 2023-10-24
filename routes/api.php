<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/************Rotas Produtos************/ 

Route::get('/produtos', 'App\Http\Controllers\ProdutoController@index');
Route::get('/produtos/{id}', 'App\Http\Controllers\ProdutoController@show');

Route::post('/produtos', 'App\Http\Controllers\ProdutoController@store');

Route::put('/produtos/{id}', 'App\Http\Controllers\ProdutoController@update');

Route::delete('/produtos/{id}', 'App\Http\Controllers\ProdutoController@destroy');

/************Fim Rotas Produtos************/ 




