<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	return view('home');
});

Route::get('server/{id}', 'ServerController@getServerInfo');

Route::get('/login', function() {
	return view('login');
});

Route::get('/register', function() {
	return view('register');
});

Route::post('/login', 'UserController@postLogin')->name('login');
Route::post('/register', 'UserController@postRegister')->name('register');

Route::get('/password/reset', 'ResetPWController@index');
Route::post('/send-reset-email', 'ResetPWController@sendResetEmail')->name('send-reset');

Route::get('/reset-password/{token}', function() {
	return view('reset-password', ['token' => 'token']);
})->name('reset-password');
Route::post('/reset', 'ResetPWController@reset')->name('reset');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
	Route::get('/home', 'HomeController@index');
	
	Route::get('/add-server', function() {
		return view('add-server');
	});
	
	Route::post('/add-server', [
		'uses' => 'ServerController@addServer',
		'as' => 'add-server'
	]);
	
	Route::get('/dashboard', [
		'uses' => 'UserController@getDashboard',
		'as' => 'dashboard'
	]);
	
	Route::post('/verify-server/{id}', [
		'uses' => 'ServerController@verifyServer',
		'as' => 'verify'
	]);
	
	Route::post('/vote/{username}', [
		'uses' => 'VoteController@sendVotePacket',
		'as' => 'vote'
	]);
	
});