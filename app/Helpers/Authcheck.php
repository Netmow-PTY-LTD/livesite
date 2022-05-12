<?php
namespace App\Helpers;
use Illuminate\Http\Request;

use Session;
use Cookie;
use Illuminate\Http\Response;

class Authcheck{
    
    public static function login()
    {
        
    }
    
    public function logout(){
        
    }
    
    public function getLogout(){
        Session::flush();
        return Redirect::to('/');
    }
    
    public function accessSessionData(Request $request) {
        
         
        //return $user_cookie;
        
        if(isset($_COOKIE["user_acc_uid"])) {
            $user_cookie = $_COOKIE["user_acc_uid"];
            if($user_cookie =="")  {
                $_COOKIE["business_uid"] = "";
                Session::flush();
            }
            
            if($request->session()->has('accuid')){
                return true;
            }
            else{
                return false;
            }
        } else {
            return false;
        }
       
    }
    
    public function storeSessionData(Request $request) {
      $request->session()->put('accuid', $request->cookie('user_acc_uid'));
      echo "Data has been added to session";
    }
    
    public function deleteSessionData(Request $request) {
      $request->session()->forget('accuid');
      echo "Data has been removed from session.";
    }
   
}