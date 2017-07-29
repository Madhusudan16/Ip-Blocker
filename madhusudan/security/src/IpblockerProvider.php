<?php

namespace madhusudan\security;

use Illuminate\Support\ServiceProvider;
use madhusudan\security\Middleware;
class IpblockerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Contracts\Http\Kernel $kernel)
    {
        //
        $this->registerHelpers();
        $kernel->prependMiddleware(\madhusudan\security\Middleware\CheckIpMiddleware::class);
        $kernel->pushMiddleware(\madhusudan\security\Middleware\CheckIpMiddleware::class);
        $this->LoadViewsFrom(__dir__."/Views","security");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // this function register new added controller and view and routes
        include __DIR__.'/routes/routes.php';
        $this->app->make('madhusudan\security\Controllers\IpblockerController');
        //$this->app->make('madhusudan\security\Models\Ipblocker');
        
    }
    
    /*
     * this function load helper file 
     */
    public function registerHelpers() 
    {
        // Load the helpers in src/helper/ipblocker_helper.php.
        $file =  __DIR__.'/helper/ipblocker_helper.php';
        
        if (file_exists($file))
        {
            require $file;
        } else {
            echo $file;
            echo "not" ; exit;
        }
    }
}
