<?php

namespace Enderlist;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Reset extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;
	
    protected $table = 'password_resets';
	public $timestamps = false;
	public $incrementing = false;
}
