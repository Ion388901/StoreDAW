<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');
Route::post('/signin', 'UserController@login')->name('user.login');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products/{order?}', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
Route::get('products/show/{id}', 'ProductController@show')->name('products.show');
// Route::resource('products', 'ProductController')->except(['show']);

Route::get('collections/create', 'CollectionController@create')->name('collections.create');
Route::post('collections', 'CollectionController@store')->name('collections.store');
Route::get('collections', 'CollectionController@index')->name('collections.index');
Route::get('collections/show/{id}', 'CollectionController@show')->name('collections.show');
Route::delete('collections/destroy/{id}', 'CollectionController@destroy')->name('collections.destroy');
Route::get('collections/edit/{id}', 'CollectionController@edit')->name('collections.edit');
Route::get('collections/product/store', 'ProductController@store')->name('collections.product.store');
Route::get('collections/update', 'CollectionController@update')->name('collections.update');
// Route::resource('collections', 'CollectionController')->except(['show']);

Route::get('collections/{collection}/products/create', 'ProductCollectionController@create')->name('collections.products.create');
Route::post('collections/{collection}/products', 'ProductCollectionController@store')->name('collections.products.store');