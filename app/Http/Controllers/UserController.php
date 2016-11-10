<?php

namespace Enderlist\Http\Controllers;

use Enderlist\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Enderlist\Http\Controllers\Controller;

class UserController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('guest');
    }

	
	public function postLogin(Request $request) {
		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
			return redirect()->route('dashboard');
		} else {
			return "Login unsuccessful";
		}
	}
	
	public function postRegister(Request $request) {
		$username = $request['username'];
		$email = $request['email'];
		$password = bcrypt($request['password']);
		
		$user = new User();
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;
		
		$user->save();
		Auth::login($user);
		
		return redirect()->route('dashboard');
	}
	
	public function getDashboard() {
		return view('dashboard');
	}
	
    
}
