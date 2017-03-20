<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendVotePacket($username) {
		
		// Format public key
		$public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgR2wHEHaPyWQ6mCv25gdO36WEalLxxab0mPmvROrjcEgILWNdFG+i+f33RJzmzb8LJHDAmFNqPgCzLq2daLawvK3DD/XTKbQnNf+Ftfed63PwAcm02cfxg8dgBY5LNa3pKlAydLs7JAToAylm200RljACrZOaD9zadSy5fZs+dCVDoFWkgnp9FG6YrzgVczXU7UKCA8vrT6n3RJo3FuaIu6TnHr4O2nXFL4BDtKtaaOwkWqey6XqtLxKMhOwbYn6AJHU0J7W7Qj0kCAu2ZJjIn+PHC0rkXcLL6faNDXCsicK5HlTOA3gk+5pMW81biH4RC3Km2DgmO+tLv+w3F6SIQIDAQAB";
		$wrapped = wordwrap($public_key, 65, "\n", true);
		$key = sprintf("-----BEGIN PUBLIC KEY-----\n%s\n-----END PUBLIC KEY-----", $wrapped);
		
		$ip = "99.235.20.78";
		$port = 8192;
		
		$vote = sprintf("VOTE\n%s\n%s\n%s\n%d\n", 'MC-Roulette', $username,  $_SERVER['REMOTE_ADDR'], time());
		openssl_public_encrypt($vote, $data, $key);
		$socket = fsockopen($ip, $port);
		if (fwrite($socket, $data)) {
			fclose($socket);
			echo "Successfully voted!";
			return true;
		} else {
			fclose($socket);
			echo "The vote has not been sent. Try again.";
			return false;
		}
	}
}