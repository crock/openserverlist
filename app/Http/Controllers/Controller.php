<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getActiveServers() {
        $servers = DB::table('servers')
                     ->where('active', '=', 1)
                     ->select('id','sname','sip','sport','sbanner','likes')
                     ->get();
        return $servers;
    }
}

trait ActiveServers {
    public function getActiveServers() {
        parent::getActiveServers();
    }
}
