<?php

namespace madhusudan\security\Models;

use Illuminate\Database\Eloquent\Model;

class Ipblocker extends Model
{
    // this take table ipblockers
    public $fillable = ['ips'];
}
