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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/check', function (Request $request) {
    return \App\User::first();
});

Route::get('/product/{id}', function ($id) {
   return \App\Product::with('variants')->where('id',$id)->first();
});

Route::get('/user/{user}/products', function (\App\User $user) {
    // Here we eager load only the variants of the product a user has
    return $user->inventory();
});

Route::post('/products/create', function (Request $request) {
    return \App\Product::create($request->all());
});

Route::delete('/products/{product}/delete', function (\App\Product $product) {
    $product->variants()->delete();
    $product->delete();
    return $product;
});