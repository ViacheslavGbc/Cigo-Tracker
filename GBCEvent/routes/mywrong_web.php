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

Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/callcreate', 'EventController@callcreate')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/profile', 'EventController@profile')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/dashboard', 'EventController@dashboard')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/', 'HomeController@welcome');
Route::post('https://s9gbcevt.gblearn.com/GBCEvent/public/create','EventController@create')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/viewrec/{id}', 'EventController@viewrec');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/editrec/{id}', 'EventController@editrec')->middleware('verified');
Route::post('https://s9gbcevt.gblearn.com/GBCEvent/public/update/{id}', 'EventController@update')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/delete/{id}', 'EventController@delete')->middleware('verified');
Route::post('https://s9gbcevt.gblearn.com/GBCEvent/public/subscribe/{event_id}/{user_id}', 'EventController@subscribe')->middleware('verified');
Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/allowEvent/{event_id}', 'EventController@allowEvent')->middleware('verified');



Auth::routes(['verify' => true]);

Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/home', 'HomeController@index')->name('home');
Route::post('https://s9gbcevt.gblearn.com/GBCEvent/public/comments/store', 'CommentController@store')->name('comment.add');
Route::post('https://s9gbcevt.gblearn.com/GBCEvent/public/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/uploadfile', 'UploadFileController@index')->middleware('verified');
Route::post('uploadfile', 'UploadFileController@upload')->middleware('verified');

Route::get('https://s9gbcevt.gblearn.com/GBCEvent/public/file/download/{id}/{name}', 'UploadFileController@show');//->name('downloadfile');
