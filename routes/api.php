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

Route::get('/user/{user}/products', 'UserController@inventory');

Route::get('/products/{id}', 'ProductController@view');

Route::post('/products/create', 'ProductController@create');

Route::delete('/products/{product}/delete', 'ProductController@delete');