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

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('homepage');
    Route::get('/shop/{id}', 'HomeController@showAllProducts')->name('shop');
    Route::get('/single-details/{id}', 'HomeController@showSingleProduct')->name('single_product');
    Route::post('/single-details/{id}', 'CartController@addToCart')->name('add_to_cart');
    Route::get('/cart/{id}', 'CartController@remove')->name('cart_remove');
});


Route::group(['namespace' => 'User', 'middleware' => 'guest'], function () {
    Auth::routes(['verify' => 'true']);

    Route::post('register', 'Auth\RegisterController@create')->name('register');
    Route::get('login', 'Auth\LoginController@getLogin')->name('get_login');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('verify/{token}', 'Auth\RegisterController@verifyEmail')->name('verify');
});

Route::group(['namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('checkout', 'CheckoutController@index')->name('checkout');

});
