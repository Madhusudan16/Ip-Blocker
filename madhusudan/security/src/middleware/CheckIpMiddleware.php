<?php

namespace madhusudan\security\Middleware;

use Closure;
use madhusudan\security\Models\Ipblocker;

class CheckIpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $ipsObj = new Ipblocker();
        if($ipsObj->count() != 0) {
            $ipsData = $ipsObj->first(); 
            $ipAddress = $ipsData->ips;
            $ipAddress = explode(",", $ipAddress);
            $currentIp =  getUserIP();
            if(!empty($ipAddress)) {
                if(in_array($currentIp, $ipAddress)) {
                    echo "Invalid access";
                    exit;
                } 
            }
        }
        return $next($request);
    }
}
