<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/artigo/createForm', 'App\Http\Controllers\ArtigoController@createForm');
Route::get('/artigo/updateForm/{id}', 'App\Http\Controllers\ArtigoController@updateForm');
Route::get('/artigo/{id}', 'App\Http\Controllers\ArtigoController@read');
Route::get('/', 'App\Http\Controllers\ArtigoController@list');
Route::get('/signinForm', 'App\Http\Controllers\Usuario@signinForm')->name('login');
Route::get('/signupForm', 'App\Http\Controllers\Usuario@signupForm');
Route::post('/signin', 'App\Http\Controllers\Usuario@signin');
Route::post('/artigo/create', 'App\Http\Controllers\ArtigoController@create')->middleware('auth');
Route::post('/artigo/update/{id}', 'App\Http\Controllers\ArtigoController@update')->middleware('auth');
Route::post('/artigo/like/{id}', 'App\Http\Controllers\ArtigoController@like')->middleware('auth');
Route::post('/artigo/save/{id}', 'App\Http\Controllers\ArtigoController@save')->middleware('auth');
Route::post('/artigo/comment/{id}', 'App\Http\Controllers\ComentarioController@comment')->middleware('auth');
Route::put('/artigo/comment/{id}', 'App\Http\Controllers\ComentarioController@update')->middleware('auth');