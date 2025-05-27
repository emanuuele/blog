<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function () {
    return response()->json(Auth::guard('api')->user());
});
Route::post('/artigo/create', 'App\Http\Controllers\ArtigoController@create');;
Route::post('/artigo/update/{id}', 'App\Http\Controllers\ArtigoController@update');
Route::post('/artigo/like/{id}', 'App\Http\Controllers\ArtigoController@like');
Route::post('/artigo/save/{id}', 'App\Http\Controllers\ArtigoController@save');
Route::post('/artigo/comment/{id}', 'App\Http\Controllers\ComentarioController@comment');
Route::put('/artigo/comment/{id}', 'App\Http\Controllers\ComentarioController@update');
Route::delete('/artigo/delete/{id}', 'App\Http\Controllers\ComentarioArtigo@destroy');
Route::delete('/artigo/comment/delete/{id}', 'App\Http\Controllers\ComentarioController@destroy');
Route::post('/signup', 'App\Http\Controllers\Usuario@signup');
Route::post('/signin', 'App\Http\Controllers\Usuario@signin');
Route::get('/usuario/logout', 'App\Http\Controllers\Usuario@logout');
