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

		/*Get User files*/
		Route::group(['prefix' => 'user'], function(){
			Route::get('/{id}/{type}', 'AdminController@getUserFiles')->name('user_files');
		});
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('/{type}', 'AdminController@getUserIndex')->name('user_dashboard');
	});

	/*Helpers*/
	Route::post('addUser', 'AdminController@addUser')->name('addUser');
	Route::post('selfUploadFile', 'AdminController@selfUploadFile')->name('selfUploadFile');
	Route::post('uploadFileToUser', 'AdminController@uploadFileToUser')->name('uploadFileToUser');
	Route::post('deleteFile', 'AdminController@deleteFile')->name('deleteFile');
});

Route::post('login', 'AdminController@login')->name('login');
Route::get('logout', 'AdminController@logout')->name('logout');