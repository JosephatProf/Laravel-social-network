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

Route::get('/chatsyst', [
		'uses'=>'ChatsController@test',
		'as'=>'chatsyst.index'
	]);
Route::group(['middleware' => ['web']], function(){
	Route::get('chatsyst','ChatsController@index');
	Route::get('chatsyst/add','ChatsController@showstore');
	Route::post('chatsyst/add','ChatsController@store');
	Route::get('ajax','ChatsController@ajax');
});
// Route::post('upload','UploadsController@imageUpload');