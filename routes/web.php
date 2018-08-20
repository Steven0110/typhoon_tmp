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

Route::get('/', 'AdminController@getLogin')->name('getLogin');

Route::group(['prefix' => 'dashboard', 'middleware' => 'check_auth'], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/', 'AdminController@getAdminIndex')->name('admin_dashboard');
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('/', 'AdminController@getUserIndex')->name('user_dashboard');
	});
});

Route::post('login', 'AdminController@login')->name('login');
Route::get('logout', 'AdminController@logout')->name('logout');