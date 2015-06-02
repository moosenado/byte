<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/* Reservation */

Route::get('reservation', 'ReservationController@index');
Route::post('check', 'ReservationController@check');
Route::post('reserve', 'ReservationController@reserve');

/* Cart */
Route::post('cart/add', 'CartController@add');
Route::get('cart', 'CartController@all');
Route::get('cart/empty', 'CartController@destroy');
Route::get('cart/remove/{id}', 'CartController@remove');
Route::get('cart/update/{id}/{qty}', 'CartController@update');

Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');



