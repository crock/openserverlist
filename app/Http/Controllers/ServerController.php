<?php

namespace Enderlist\Http\Controllers;

use Enderlist\Server;
use DB;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

use Illuminate\Http\Request;
use Enderlist\Http\Requests;
use Enderlist\Http\Controllers\Controller;

class ServerController extends Controller
{
	
    public function addServer(Request $request) {
		$name = $request['sname'];
		$ip = $request['sip'];
		$port = $request['sport'];
		$desc = $request['sdesc'];
		$sbanner = $request['sbanner'];
		$votifier = $request['votifier'];
		$vport = $request['vport'];
		$vpubkey = $request['vpubkey'];
		
		$server = new Server();
		$server->sname = $name;
		$server->sip = $ip;
		$server->sport = $port;
		$server->sdesc = $desc;
		$server->active = 0;
		$server->hash = uniqid("EL_".md5($name), true);
		$server->votifier = $votifier;
		$server->vport = $vport;
		$server->vpubkey = $vpubkey;
		
		$server->save();
		return redirect()->route('dashboard');
	}
	
	protected $result = "false";
	
	public function verifyServer($id) {
		
		try
		{
			$hash = DB::table('servers')->where('id', $id)->value('hash');
			$ip = DB::table('servers')->where('id', $id)->value('sip');
			$port = DB::table('servers')->where('id', $id)->value('sport');
			
			$Query = new MinecraftPing( $ip, $port );
				$motd = $Query->Query()['description']['text'];
			
			if($motd == $hash) {
				DB::table('servers')
					->where('id', $id)
					->update(['active' => 1]);
				
				$result = "true";
			}
		}
		catch( MinecraftPingException $e )
		{
			echo $e->getMessage();
		}
		finally
		{
			$Query->Close();
		}
		return $result;
	}
	
	public function editServer($id) {
		
	}
	
	public function deleteServer($id) {
		
	}
	
	public function getServerInfo($id) {
		return view('server');
	}
}