<?php

namespace Shulkerlist;

use Illuminate\Database\Eloquent\Model;
//use \Conner\Tagging\Taggable;

class Server extends Model
{
	//use Taggable;
	
	protected $table = 'links';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sname', 'sip', 'sport', 'sdesc', 'active', 'ownerID', 'likes', 'votifier', 'vport', 'sbanner', 'tags',
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
