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

//Dashboard
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::get('sopentries', 'SopEntriesController@index');
Route::get('sopentries/data', 'SopEntriesController@getAnyData');
Route::get('sopentries/getSop/{filename}', [
		'as' 	=> 'getEntry',
		'uses' 	=> 'SopEntriesController@getSop'
	]);

//Route for Each Unit
Route::get('bpo', 'SopEntriesController@getDataBPO');


//Route for static page
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

//
Route::resource('sopentries', 'SopEntriesController');

//Authentication
Auth::routes();
