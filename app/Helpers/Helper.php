<?php
namespace App\Helpers;
use Session;

class Helper{
    public static function checkSession()
    {
        
       // dd(Session::get('accuid'));
        
        if(Session::get('accuid') == '')
        {
            
            return \Redirect::to('https://miyn.net/login');
            
        }
    }
}