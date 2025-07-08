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
Route::delete('/artigo/delete/{id}', 'App\Http\Controllers\ComentarioArtigo@destroy');
Route::delete('/artigo/comment/delete/{id}', 'App\Http\Controllers\ComentarioController@destroy');
Route::post('/signup', 'App\Http\Controllers\Usuario@signup');
Route::get('/usuario/logout', 'App\Http\Controllers\Usuario@logout');
