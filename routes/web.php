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

Route::get('/', 'IndexController@index');

Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');

Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');

Route::get('/logout', 'UserController@logout');

Route::get('/search', 'IndexController@search');
Route::get('/search2', 'IndexController@search2');

Route::get('/shop', 'ShopController@index');
Route::get('/shop/{category_id}', 'ShopController@category');
Route::get('/shop/{category_id}/{product_id}', 'ShopController@product');


Route::get('/orders', 'IndexController@getOrders');

Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/create-product', 'AdminController@createProduct');
    Route::post('/create-product', 'AdminController@saveProduct');
    Route::get('/orders', 'AdminController@orders');

});

Route::prefix('basket')->group(function () {
    Route::post('/add', 'BasketController@addToBasket');
    Route::get('/', 'BasketController@index');
    Route::get('/checkout', 'BasketController@checkout');
    Route::post('/deleteProduct', 'BasketController@deleteProduct');
});
