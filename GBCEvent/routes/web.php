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


//Event Controller
Route::get('/callcreate', 'EventController@callcreate')->middleware('verified');
Route::get('/profile', 'EventController@profile')->middleware('verified');
Route::get('/dashboard', 'EventController@dashboard')->middleware('verified');

Route::post('/create','EventController@create')->middleware('verified');
Route::get('/viewrec/{id}', 'EventController@viewrec');
Route::get('/editrec/{id}', 'EventController@editrec')->middleware('verified');
Route::post('/update/{id}', 'EventController@update')->middleware('verified');
Route::get('/delete/{id}', 'EventController@delete')->middleware('verified');
Route::post('/subscribe/{event_id}/{user_id}', 'EventController@subscribe')->middleware('verified');
Route::get('/searchEvent', 'EventController@search');

Route::get('/refuse/{id}', 'EventController@refuse')->middleware('verified');
Route::get('/refuse_res/{id}/{reason_id}', 'EventController@refuse_res')->middleware('verified');
Route::get('/allowEvent/{event_id}', 'EventController@allowEvent')->middleware('verified');


//User Controller

Route::get('/makeOwner/{user_id}', 'UserController@makeOwner')->middleware('verified');
Route::get('/makeActive/{user_id}', 'UserController@makeActive')->middleware('verified');
Route::get('/blockUser/{user_id}', 'UserController@blockUser')->middleware('verified');
Route::get('/deleteUser/{user_id}', 'UserController@deleteUser')->middleware('verified');


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

//Comment Controller

Route::post('/comments/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::get('/postComment/{comment_id}', 'CommentController@postComment')->middleware('verified');
Route::get('/blockComment/{comment_id}', 'CommentController@blockComment')->middleware('verified');
Route::get('/discardComment/{comment_id}', 'CommentController@deleteComment')->middleware('verified');


//File Controller

Route::get('/uploadfile', 'UploadFileController@index')->middleware('verified');
Route::post('uploadfile', 'UploadFileController@upload')->middleware('verified');
Route::get('/file/download/{id}/{name}', 'UploadFileController@show');//->name('downloadfile');
