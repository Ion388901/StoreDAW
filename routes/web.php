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
})->name('homepage');

Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');

Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');   
Route::post('/signin', 'UserController@login')->name('user.login');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/products/cart', 'ProductController@cart')->name('cart');
Route::get('/products/add-to-cart/{id}', 'ProductController@addToCart')->name('add-to-cart');
Route::patch('/products/update-cart', 'ProductController@update')->name('update-cart');
Route::delete('/products/remove-from-cart', 'ProductController@remove')->name('remove-from-cart');

Route::get('orders/create', 'OrderController@create')->name('order.create');
Route::post('orders/{cart}/transaction-done', 'OrderController@transaction')->name('orders.transaction');
Route::get('orders/{cart}/purchase/success', function() {
    echo 'La compra fue realizada exitosamente';
})->name('orders.transaction.success');

Route::get('/products', 'ProductController@index')->name('products.index');    
Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
Route::get('/products/{order?}', 'ProductController@index')->name('products.index');

Route::get('/collections', 'CollectionController@index')->name('collections.index');    
Route::get('/collections/show/{id}', 'CollectionController@show')->name('collections.show');    
Route::get('/collections/{order?}', 'CollectionController@index')->name('collections.index');


