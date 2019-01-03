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
        Route::get('home', 'HomeController@index')->name('admin.dashboard');
        Route::group(['as' => 'admin.'], function () {
            Route::resource('categories', 'CategoryController');
            Route::resource('users', 'UserController');
            Route::resource('orders', 'OrderController')->except(['create', 'show', 'store']);
            Route::resource('products', 'ProductController');
            Route::get('/products/{idProduct}/colors/{idColor}', 'ProductController@getColor');
        });
    });
});
Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('detail-order', 'OrderController@index')->name('detail-order');
    Route::get('products', 'HomeController@showProductCategory');
    Route::get('profile', 'UserController@getProfile')->name('profile');
    Route::get('checkout-cart', 'OrderController@show')->name('checkout-cart');
});
Route::group(['as' => 'user.', 'namespace' => 'Api\User'], function () {
    Route::get('register', 'RegisterController@index')->name('register');
});
Route::group(['namespace' => 'Api\Admin'], function () {
    Route::get('password-reset', 'PasswordResetController@index')->name('password-reset');
});
