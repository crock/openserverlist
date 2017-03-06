<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use \Conner\Tagging\Taggable;
    	
	protected $table = 'servers';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sname', 'sip', 'sport', 'sdesc', 'active', 'ownerID', 'likes', 'votifier', 'vport', 'sbanner', 'tags', 'scountry'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'hash', 'vpubkey',
    ];
}
