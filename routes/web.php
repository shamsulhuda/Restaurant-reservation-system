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


Route::get('/', 'HomeController@index')->name('welcome');

Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');
//user message
Route::post('/contact', 'ContactController@sendMessage')->name('contact.send');

Auth::routes();
// Auth::routes([
// 	'register'=> false,
// 	'reset' => false,
// 	'verify' => false,
// ]);


Route::group(['prefix'=>'admin', 'middleware'=>'auth','namespace'=>'admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

	// slider
	Route::resource('gallery', 'SiteGalleryController');
	Route::resource('siteinfo/info', 'SiteInfoController');
	Route::resource('slider', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::resource('dish', 'DishesController');
	Route::resource('dishitem', 'DishItemsController');

	Route::get('reservation', 'ReservationController@index')->name('reservation.index');
	Route::post('reservation/{id}', 'ReservationController@status')->name('reservation.status');
	Route::delete('reservation/{id}', 'ReservationController@destroy')->name('reservation.delete');

	Route::get('contact', 'ContactController@index')->name('contact.index');
	Route::get('contact/{id}', 'ContactController@show')->name('contact.show');
	Route::delete('contact/{id}', 'ContactController@destroy')->name('contact.destroy');
});
