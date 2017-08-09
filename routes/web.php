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

//Route for Download
Route::get('sopentries/getSop/{filename}', [
		'as' 	=> 'getEntry',
		'uses' 	=> 'PagesController@getSop'
	]);

//Route for Each Unit
Route::get('ipa', 'PagesController@getDataIPA');
Route::get('epd', 'PagesController@getDataEPD');
Route::get('bpd', 'PagesController@getDataBPD');
Route::get('opd', 'PagesController@getDataOPD');
Route::get('spd', 'PagesController@getDataSPD');
Route::get('epo', 'PagesController@getDataEPO');
Route::get('bpo', 'PagesController@getDataBPO');
Route::get('opo', 'PagesController@getDataOPO');
Route::get('spo', 'PagesController@getDataSPO');
Route::get('cfu', 'PagesController@getDataCFU');
Route::get('ga', 'PagesController@getDataGA');


//Route for static page
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

//
Route::resource('sopentries', 'SopEntriesController');

//Authentication
Auth::routes();
