<?php

namespace Shulkerlist\Http\Controllers;

use Mail;
use DB;
use Shulkerlist\Reset;
use Shulkerlist\User;
use Illuminate\Http\Request;
use Shulkerlist\Http\Requests;

class ResetPWController extends Controller
{
	public function reset(Request $request) {
		
		$dbtoken = Reset::where('token', $request['token'])->firstOrFail();
		$user = User::where('email', $request['email']);
		
		if ($dbtoken != NULL && $dbtoken == $request['token']) {
			if ($request['password'] == $request['password-confirm']) {
				$user->update(['password' => bcrypt($request['password'])]);
			} else {
				return back();
			}
		} else {
			return $dbtoken;
		}
	}
	
	public function resetPassword(Request $request) {
		//$toChange = Shulkerlist\User::where('email', $email);
		return view('reset-password', ['token' => $request]);
	}
	
	public function sendResetEmail(Request $request) {
		
		$reset = new Reset;
		
		$reset->token = $request['token'];
		$reset->email = $request['email'];
		
		$reset->save();
		
		Mail::send('emails.reset', ['email' => $request, 'token' => $request['token']], function($message) use ($request) {
            $message->from('contact@enderlist.com', 'Shulkerlist');
            $message->to($request->email)->subject('Password Reset Email');
        });
		
	}
	
	public function index() {
		return view('forgot-password')->with('token', uniqid('', true));
	}
}
