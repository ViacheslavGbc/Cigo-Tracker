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
//Cigo

Route::post('/neworder','CigoController@neworder');
Route::get('/deleteorder/{id}', 'CigoController@deleteorder');
Route::get('/newstatus/{id}/{status_id}', 'CigoController@newstatus');

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

