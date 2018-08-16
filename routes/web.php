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
Route::prefix('admin')->namespace('Admin')->group(function () {
    Auth::routes();
    Route::middleware(['admin'])->group(function () {
        Route::get('home', 'HomeController@index');
        Route::group(['as' => 'admin.'], function () {
            Route::resource('categories', 'CategoryController');
            Route::resource('users', 'UserController');
            Route::resource('orders', 'OrderController')->except(['create', 'show', 'store']);
            Route::resource('products', 'ProductController');
            Route::get('products/{product}/showcolorproduct', 'ProductController@showColorProduct')->name('products.showColorProduct');
            Route::get('/products/color/{id}', 'ProductController@getColor')->name('products.getColor');
        });
    });
});
