<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/
if (!defined('PAGINATION')) {
    define('PAGINATION', 5);
}



Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {

    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');

});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'PagesController@homepage')->name('admin.index');
    Route::resource('manage_products', 'ProductsController');
    Route::resource('manage_category', 'CategoryController');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');
});
