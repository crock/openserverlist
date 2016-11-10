<?php

namespace Enderlist;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Server extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}
