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
	
	public function viewServerPage($id) {
		$data = $this->getServerInfo($id);
		return view('server')->with($data);
	}
	
	public function getActiveServers() {
		$servers = DB::table('servers')->where('active', '=', 1)->get();
		
		 return response()->json($servers);
	}
	
	public function getServerInfo($id) {
		$server = DB::table('servers')->where('id', '=', $id)->get()->first();
		$user = DB::table('users')->where('id', '=', $server->ownerID)->get()->first();
		$info;
		$ip = $server->sip;
		$port = $server->sport;
		
		$tags = Server::existingTags()->pluck('name');
		
		$url = "http://mcapi.us/server/status?ip=$ip&port=$port";
		$content = file_get_contents($url);
		$json_a = json_decode($content, true);
		
		if ($json_a['online'] == false) {
			$info = false;
		} else {
			try {
				$Query = new MinecraftPing( $ip, $port );
				$info = $Query->Query();
			}
			catch( MinecraftPingException $e ) {
				echo $e->getMessage();
			}
			finally {
				$Query->Close();
			}
		}
		
				
		return array('server'=>$server,'info'=>$info,'tags'=>$tags,'user'=>$user);
	}

}