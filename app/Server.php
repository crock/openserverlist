<?php

namespace Enderlist;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sname', 'sip', 'sport', 'sdesc', 'active', 'ownerID', 'likes', 'votifier', 'vport', 'sbanner',
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
