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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dash');
Route::get('/server/{id}', [
	'uses' => 'ServerController@viewServerPage',
	'as' => 'id',
	//'middleware' => 'guest'
]);

Route::get('/add-server', 'HomeController@setupServerRegPage');

Route::post('/add-server', [
	'uses' => 'ServerController@addServer',
	'as' => 'add-server'
]);

Route::post('/verify-server/{id}', [
	'uses' => 'ServerController@verifyServer',
	'as' => 'verify'
]);

Route::post('/edit-server/{id}', [
	'uses' => 'ServerController@editServer',
	'as' => 'edit'
]);

Route::post('/delete-server/{id}', [
	'uses' => 'ServerController@deleteServer',
	'as' => 'delete'
]);

Route::get('/vote/{username}', [
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

