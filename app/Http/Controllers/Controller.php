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
        return DB::table('servers')
                     ->where('active', '=', 1)
                     ->select('id','sname','sip','sport','sbanner','likes')
                     ->get();
    }

    public function getServerInfo($id) {
        return DB::table('servers')
                    ->where('id', '=', $id)
                    ->select('id','sname','sip','sport','sbanner','likes','votes','scountry','sdesc','website','tags')
                    ->get();
    }
}

trait ActiveServers {
    public function getActiveServers() {
        parent::getActiveServers();
    }
}

trait ServerTable {
    public function getServerInfo() {
        parent::getServerInfo();
    }
}