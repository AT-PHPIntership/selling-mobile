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
Route::group(['as' => 'api.', 'namespace' => 'Api\User'], function () {
    Route::apiResource('categories', 'CategoryController');
    Route::get('show-product-promotion', 'HomeController@promotion');
    Route::get('products', 'ProductController@index')->name('product');
    Route::get('show-products', 'ProductController@showProductCategory');
    Route::apiResource('products', 'ProductController');
    Route::post('login', 'LoginController@login');
    Route::post('register', 'LoginController@register')->name('register');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'LoginController@logout');
        Route::put('users/{id}/info', 'UserController@update');
        Route::get('users/{id}/info', 'UserController@index');
    });
});
