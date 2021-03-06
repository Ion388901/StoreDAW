<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
// Rutas de inicio de sesión
Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');
Route::post('/signin', 'UserController@login')->name('user.login');

// Ruta de entrada
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Rutas de las funciones de los productos
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products/{order?}', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
Route::get('products/show/{id}', 'ProductController@show')->name('products.show');
Route::delete('products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::put('products/update/{id}', 'ProductController@update')->name('products.update');

// Rutas de las funciones de las colecciones
Route::get('collections/create', 'CollectionController@create')->name('collections.create');
Route::post('collections', 'CollectionController@store')->name('collections.store');
Route::get('collections', 'CollectionController@index')->name('collections.index');
Route::get('collections/show/{id}', 'CollectionController@show')->name('collections.show');
Route::delete('collections/destroy/{id}', 'CollectionController@destroy')->name('collections.destroy');
Route::get('collections/edit/{id}', 'CollectionController@edit')->name('collections.edit');
Route::put('collections/update/{id}', 'CollectionController@update')->name('collections.update');
Route::get('collections/{collection}/products/create', 'ProductCollectionController@create')->name('collections.product.create');
Route::post('collections/{collection}/products', 'ProductCollectionController@store')->name('collections.product.store');

// Ruta de la funcion de los reportes
Route::get('reports', 'ReportController@index')->name('reports.index');