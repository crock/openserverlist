<?php

namespace Shulkerlist\Http\Controllers;

use Illuminate\Http\Request;
use Shulkerlist\Http\Requests;
use Shulkerlist\Http\Controllers\Controller;

class VoteController extends Controller
{	
    public function sendVotePacket($username) {
		
		// Format public key
		$public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsBValUIW3roWYrDUag4bUo8SgCQ9CMJERHdPHPzJt9tBKw2SIYKokniJxdEwrOYnxQ7VeTUwsDrYi11ENQgprWCjdxXIouJ5hWQQS6/mNEMlbxONbXMunfQgAa7/M1FDRN56o4/w/uS/tOsNSrSHrpZV+szcuvIwaoZa+XsBhlhmfldE0kdcXLKilrluDLadUK6G5f45PW8G77IILODU8eaeG5UEC5acjzILtTw7w2Cog92t8g+MLIS05XrQkT4cGW1nuNwB8h20QTFWSQX7SxuxcQKaJaVWo3efIXsH/vExCh55nv+3YyKQxlCmNOd7PZnYOwHPszg6ojQQzcUg+QIDAQAB";
		$wrapped = wordwrap($public_key, 65, "\n", true);
		$key = sprintf("-----BEGIN PUBLIC KEY-----\n%s\n-----END PUBLIC KEY-----", $wrapped);
		
		$ip = "172.93.108.138";
		$port = 8192;
		
		$vote = sprintf("VOTE\n%s\n%s\n%s\n%d\n", 'MC-Roulette', $username,  $_SERVER['REMOTE_ADDR'], time());
		openssl_public_encrypt($vote, $data, $key);
		$socket = fsockopen($ip, $port);
		if (fwrite($socket, $data)) {
			fclose($socket);
			return view('dashboard')->with('result', "Successfully voted!");
			return true;
		} else {
			fclose($socket);
			echo "The vote has not been sent. Try again.";
			return false;
		}
	}
}