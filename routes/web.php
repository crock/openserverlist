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
    return view('home');
});

Route::get('server/{id}', 'ServerController@getServerInfo');

Auth::routes();
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


/*
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
*/

