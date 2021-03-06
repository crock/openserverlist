<?php

namespace App\Http\Controllers;

use DB;
use App\Server;
use App\User;
use App\Http\Controllers\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\ServerController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['only'=>'dash']);
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = new ServerController();
        return view('home')->with('servers', $o->getServers());
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dash(Request $request)
    {
	    $user = $request->user()->id;
	    $servers = DB::table('servers')->where('ownerID', '=', $user)->get();
        return view('dashboard')->with('servers', $servers);
    }
    
    public function setupServerRegPage() {
	    $country_options = DB::table('countries')->orderBy('name', 'asc')->get();
    	return view('add-server', array('countries' => $country_options));
    }
}