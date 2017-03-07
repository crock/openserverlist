<?php

namespace App\Http\Controllers;

use App\Server;
use DB;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

class ServerController extends Controller
{
	//use ActiveServers;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => array('getServerInfo','viewServerPage','viewServerList')]);
    }
	
    public function addServer(Request $request) {
	    
		$name = $request['sname'];
		$ip = $request['sip'];
		$port = $request['sport'];
		$desc = $request['sdesc'];
		$website = $request['website'];
        $country = $request['scountry'];
		$path = $request->file('sbanner')->store('banners');
		$votifier = $request['votifier'];
		$vport = $request['vport'];
		$vpubkey = $request['vpubkey'];
		$owner = $request['ownerID'];
		$tags = $request['tags'];
		
		$link = Server::create([]);
		$link->tag(explode(',', $tags));
		
		$server = new Server();
		$server->sname = $name;
		$server->sip = $ip;
		$server->sport = $port;
		$server->sdesc = $desc;
		$server->website = $website;
        $server->scountry = $country;
		$server->sbanner = $path;
		$server->active = 0;
		$server->hash = uniqid("EL_".md5($name), true);
		$server->tags = $tags;
		$server->votifier = $votifier;
		$server->vport = $vport;
		$server->vpubkey = $vpubkey;
		$server->ownerID = $owner;
		
		$server->save();
		return redirect()->back();
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

	public function pingServer($ip, $port) {
		try {
			$Query = new MinecraftPing( $ip, $port );
			$stats = $Query->Query();
		}
		catch( MinecraftPingException $e ) {
			echo $e->getMessage();
			return false;
		}
		finally {
			$Query->Close();
			return $stats;
		}
	}

	public function getServers() {
		$servers = $this->getActiveServers();
		$s = [];

		foreach ($servers as $server) {

			// Converts stdClass object to array
			$array = json_decode(json_encode($server), True);

			// Returns array of json objects
			$data = $this->pingServer($server->sip,$server->sport);

			// Merges server data from DB with the extra query information 
			array_push($s, array_merge($array, $data));
		}

		return $s;
	}
	
	public function viewServerPage($id) {
		return view('server')->with($this->getServerInfo($id));
	}
	
	public function getServerInfo($id) {
		$server = DB::table('servers')->where('id', '=', $id)->get()->first();
		$user = DB::table('users')->where('id', '=', $server->ownerID)->get()->first();
		$ip = $server->sip;
		$port = $server->sport;
		
		$ts = Server::with('tagged')->first();
		$tags = $ts->tags; 
		
		$info = $this->pingServer($ip,$port);
			
		return array('server'=>$server,'info'=>$info,'tags'=>$tags,'user'=>$user);
	}

}