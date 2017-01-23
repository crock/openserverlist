<?php

namespace Shulkerlist\Http\Controllers;

use DB;
use Shulkerlist\Server;
use Shulkerlist\User;
use Shulkerlist\Http\Controllers\Auth;
use Shulkerlist\Http\Requests;
use Illuminate\Http\Request;

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
	    $servers = DB::table('servers')->where('active', '=', 1)->get();
        return view('home')->with('servers', $servers);
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
	    $country_optons = DB::table('countries')->orderBy('name', 'asc')->lists('name','id');

    	return view('add-server', array('countries' => $country_options));
    }
}
