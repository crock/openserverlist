<?php

namespace Enderlist\Http\Controllers;

use DB;
use Enderlist\Server;
use Enderlist\User;
use Enderlist\Http\Controllers\Auth;
use Enderlist\Http\Requests;
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
        $this->middleware('auth');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
}
