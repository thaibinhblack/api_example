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

Route::get('/products','ProductController@index')->middleware('cors');;
Route::get('/product/{id}', 'ProductController@show')->middleware('cors');
Route::post('/product','ProductController@store')->middleware('cors');;
Route::post('/product/{id}/update', 'ProductController@update')->middleware('cors');
Route::post('/product/{id}/destroy', 'ProductController@destroy')->middleware('cors');