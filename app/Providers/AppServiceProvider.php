<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use View;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         view()->composer('*', function($view){
             
            $liveurl =  \Config::get('app.live_url');
            $clienturl =  \Config::get('app.client_url');
            $appurl =  \Config::get('app.apps_url');
            $apiurl =  \Config::get('app.api_url');
            $mainurl =  \Config::get('app.main_url');
            
            View::share ( 'liveurl', $liveurl); 
            View::share ( 'appurl', $appurl); 
            View::share ( 'clienturl', $clienturl);
            View::share ( 'mainurl', $mainurl);
            View::share ( 'apiurl', $apiurl);
  
        });
    }
}
