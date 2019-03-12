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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	// Route Day Controller
	Route::get('/days', 'DayController@index')->name('days');
	Route::post('/days', 'DayController@store')->name('days.store');
	Route::get('/days/destroy/{id}', 'DayController@destroy')->name('days.destroy');
	Route::get('/days/{id}', 'DayController@show');
	Route::post('/days/update/{id}', 'DayController@update');

	// Route Area Controller
	Route::get('/areas', 'AreaController@index')->name('areas');
	Route::post('/areas', 'AreaController@store')->name('areas.store');
	Route::get('/areas/destroy/{id}', 'AreaController@destroy')->name('areas.destroy');
	Route::get('/areas/{id}', 'AreaController@show');
	Route::post('/areas/update/{id}', 'AreaController@update');

	// Route Student Controller
});
