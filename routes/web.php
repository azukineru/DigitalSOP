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

Route::get('bpo', 'PagesController@getBPO');
Route::get('dashboard', 'PagesController@getDashboard');
Route::get('login', 'PagesController@getLogin');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

Route::resource('aplikasi', 'AplikasiController');
