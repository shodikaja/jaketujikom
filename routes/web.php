<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'GuestsController@index');


Auth::routes();
// Route::get('login', 'AdminController@error');
Route::get('/home', 'AdminController@index');
Route::get('admin-l', 'AdminController@login');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
	Route::resource('quotes', 'QuotesController');
	Route::resource('bgquotes', 'BgQuotesController');
	Route::resource('Header', 'HeaderController');
	Route::resource('Product', 'ProductController');
});

Route::resource('user', 'GuestsController@services');
Route::resource('admin', 'GuestsController@admin');
Route::get('/model/{id}', array('as' => 'showperkategori', 'uses' =>'GuestsController@showperkategori')); 