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

Route::get('/', 'MainController@show')->middleware('auth');

Route::get('/log','logController@show')->name('log');
Route::post('/log','logController@authenticate');
Route::get('/logout', 'logController@logout')->name('logout');

Route::get('/reg','RegController@show')->name('reg');
Route::put('/reg','RegController@store');





Route::get('/main/add','AddController@show')->middleware('auth');
Route::put('/main','AddController@store')->middleware('auth');
Route::delete('/main','AddController@delete')->middleware('auth');


Route::get('/main','MainController@show')->middleware('auth')->name('main');
Route::post('/main','MainController@store')->middleware('auth');

Route::get('/main/edit/{id}','EditController@show')->middleware('auth')->name('edit');
Route::put('/main/edit','EditController@edit')->middleware('auth');

Route::get('/main/share','ShareController@show')->middleware('auth');
Route::put('/main/share','ShareController@share')->middleware('auth')->name('share');
Route::patch('/main/share','ShareController@ret')->middleware('auth');

Route::get('/allShares','ShareController@allShares')->name('allShares')->middleware('auth');

Route::post('/export','DocumentsExport@export')->name('export')->middleware('auth');
Route::post('/import','DocumentsImport@import')->name('import')->middleware('auth');






