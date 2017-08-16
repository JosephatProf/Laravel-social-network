<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
*Welcome
*/
Route::get('/', [
	'uses'=>'WelcomeController@index',
	'as'=>'welcome'
	]);

/**
*Home
*/
Route::get('/', [
	'uses'=>'HomeController@index',
	'as'=>'home'
	]);

/**
*Authentication
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
*alert
*/
Route::get('/alert', function () {
	return redirect()->route('home')->with('info', 'You are signed up!');
});

/**
*signup
*/
Route::get('/signup', [
	'uses'=>'AuthController@getSignUp',
	'as'=>'auth.signup',
	'middleware'=>['guest'],
]);
Route::post('/signup', [
	'uses'=>'AuthController@postSignUp',
	'middleware'=>['guest'],
]);
//sign in
Route::get('/signin', [
	'uses'=>'AuthController@getSignin',
	'as'=>'auth.signin',
	'middleware'=>['guest'],
]);
Route::post('/signin', [
	'uses'=>'AuthController@postSignin',
	'middleware'=>['guest'],
	
]);
//log out
Route::get('/signout', [
	'uses'=>'AuthController@getSignout',
	'as'=>'auth.signout',
	// 'middleware'=>['au'],
]);
//reset password
Route::get('/password', [
	'uses'=>'ForgotPasswordController@getresetPassword',
	'as'=>'auth.password',
	// 'middleware'=>['au'],
]);
Route::post('/password', [
	'uses'=>'ForgotPasswordController@resetPassword',
	// 'middleware'=>['au'],
]);
//search
Route::get('/search',[
		'uses'=>'SearchController@getResults',
		'as'=>'search.results'
]);

/**
*
*User profile*
*/
Route::get('/user/{username}',[
	'uses'=>'ProfileController@getProfile',
	'as'=>'profile.index',
]);

Route::get('/profile/edit',[
	'uses'=>'ProfileController@getEdit',
	'as'=>'profile.edit',
	'middleware'=>['auth'],
]);
Route::get('/profile/edit/{filename}',[
	'uses'=>'ProfileController@getUserImage',
	'as'=>'profile.edit.image',

]);
Route::post('/profile/edit',[
	'uses'=>'ProfileController@postEdit',
	'middleware'=>['auth'],
]);
/**
*
*Friends
*/
Route::get('/friends',[
	'uses'=>'FriendController@getIndex',
	'as'=>'friend.index',
	'middleware'=>['auth'],
]);
Route::get('/friends/add/{username}',[
	'uses'=>'FriendController@getAdd',
	'as'=>'friend.add',
	'middleware'=>['auth'],
]);
Route::get('/friends/accept/{username}',[
	'uses'=>'FriendController@getAccept',
	'as'=>'friend.accept',
	'middleware'=>['auth'],
]);
//deleting friends
Route::post('/friends/delete/{username}',[
	'uses'=>'FriendController@postDelete',
	'as'=>'friend.delete',
	'middleware'=>['auth'],
]);
//
//statuses
Route::post('/status',[
	'uses'=>'StatusController@postStatus',
	'as'=>'status.post',
	'middleware'=>['auth'],
]);

Route::get('/profile/chats/',[
	'uses'=>'ChatsController@getSentMessages',
]);
//reply to posts
Route::post('/status/{statusId}/reply',[
	'uses'=>'StatusController@postReply',
	'as'=>'status.reply',
	'middleware'=>['auth'],
]);
//messageing
Route::post('/profile/chat/{friendId}/messages',[
	'uses'=>'ChatsController@postMessage',
	'as'=>'messages.post',
	'middleware'=>['auth'],
]);
// friend post message - reply
Route::get('/profile/chat/reply/{friendId}',[
	'uses'=>'ChatsController@getReplyMessage',
	'as'=>'message.reply',
	'middleware'=>['auth'],
]);
//get responding id
// Route::get('/profile/chat/reply/{friendId}',[
// 	'uses'=>'ChatsController@getReplyId',
// 	'as'=>'message.id',
// 	'middleware'=>['auth'],
// ]);




//likes
Route::get('/status/{statusId}/like',[
	'uses'=>'StatusController@getLike',
	'as'=>'status.like',
	'middleware'=>['auth'],
]);

// //upload image
Route::get('/profile/upload',[
	'uses'=>'ProfileController@uploads',
	'as'=>'profile.upload',
	'middleware'=>['auth'],
	
]);

Route::get('/profile/upload/{filename}',[
	'uses'=>'ProfileController@getUserImage',
	'as'=>'profile.upload.image',

]);
Route::post('/profile/upload','ProfileController@imageUpload');
//messages
Route::get('/profile/messages',[
	'uses'=>'MessagesController@viewMessage',
	'as'=>'profile.messages',
	'middleware'=>['auth'],
	
]);
//route direct to group creation
Route::get('/profile/group',[
	'uses'=>'GroupsController@groupHome',
	'as'=>'profile.group',
	'middleware'=>['auth'],
]);
//show available groups
Route::get('/{id}', [
	'uses'=>'GroupsController@showGroups',
	'as'=>'group.avail',
	'middleware'=>['auth'],
]);
//create groups
Route::post('/profile/group',[
	'uses'=>'GroupsController@postGroup',
	'middleware'=>['auth'],
]);

Route::get('/profile/chats',[
	'uses'=>'ChatsController@displayChats',
	'as'=>'profile.chats',
	'middleware'=>['auth'],
	
]);
//JOIN GROUP
Route::get('profile/groups/{groupname}',[
	'uses'=>'GroupsController@getJoin',
	'as'=>'group.join',
	'middleware'=>['auth'],
]);
//get link for posting with images
Route::get('/profile/images',[
	'uses'=>'StatusController@getImages',
	'as'=>'profile.images',
	'middleware'=>['auth'],
]);
//post the image
Route::post('/profile/images',[
	'uses'=>'StatusController@postStatusWithImage',
	'middleware'=>['auth'],
]);

//route for advertising
Route::get('/profile/advert',[
	'uses'=>'AvertisersController@index',
	'as'=>'profile.advert',
	'middleware'=>['auth'],
]);
Route::get('/adverts/advert',[
	'uses'=>'AvertisersController@getAvailableAds',
	'as'=>'advert.ad',
	'middleware'=>['auth'],
]);
//post adverts
Route::post('/profile/advert',[
	'uses'=>'AvertisersController@postAdverts',
	'middleware'=>['auth'],
]);
//{username}
// Route::group(['middleware' => 'web'], function () {
	
//     Route::auth();

//     Route::get('/home', 'HomeController@index');

//     Route::get('/messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
//     Route::get('/messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
//     Route::post('/messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
//     Route::get('/messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
//     Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
// });

// Route::get('/profile/chats/{username}', function($username)
// {
// 	return View::make('chats')->with('username',$username);
// });
// Route::post('/profile/chats/sendMessage',[
// 	'uses'=>'ChatsController@sendMessage',
// 	'middleware'=>['auth'],
// ]);
// Route::post('/profile/chats/isTyping',[
// 	'uses'=>'ChatsController@isTyping',
// 	'middleware'=>['auth'],
// ]);
// Route::post('/profile/chats/notTyping',[
// 	'uses'=>'ChatsController@notTyping',
// 	'middleware'=>['auth'],

// ]);
// Route::post('/profile/chats/retrieveChatMessages',[
// 	'uses'=>'ChatsController@retrieveChatMessages',
// 	'middleware'=>['auth'],

// ]);
// Route::post('/profile/chats/retrieveTypingStatus',[
// 	'uses'=>'ChatsController@retrieveTypingStatus',
// 	'middleware'=>['auth'],
// ]);
// Route::get('/{username}', function($username)
// {
// 	return View::make('chats')->with('username',$username);
// });

// Route::post('sendMessage', array('uses' => 'ChatController@sendMessage'));
// Route::post('isTyping', array('uses' => 'ChatController@isTyping'));
// Route::post('notTyping', array('uses' => 'ChatController@notTyping'));
// Route::post('retrieveChatMessages', array('uses' => 'ChatController@retrieveChatMessages'));
// Route::post('retrieveTypingStatus', array('uses' => 'ChatController@retrieveTypingStatus'));
Route::get('/admin/index',[
	'uses'=>'AdminController@index',
	'as'=>'admin.index',
]);
Route::get('/admin/login',[
	'uses'=>'AdminController@getLogin',
	'as'=>'admin.login',
	
]);
Route::post('/admin/login',[
	'uses'=>'AdminController@postLogin',
	
]);
//show users
Route::get('/admin/index/users',[
	'uses'=>'AdminController@showUsers',
	'as'=>'admin.users',
]);
Route::get('/admin/index/groups',[
	'uses'=>'AdminController@showGroups',
	'as'=>'admin.groups',
]);
