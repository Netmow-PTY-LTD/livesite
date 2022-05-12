<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\ChatUser;

class ChatNowController extends Controller
{
    
    
    public function new_chat_now($uid){
 
        $business           = Business::where('uid', $uid)->first();
        $business_address   = $business->b_address;
        $dashboard_uid      = request()->query('dashboard_uid');
        
        $dashboaed_business         = Business::where('uid', $dashboard_uid)->first();
        $dashboard_uid              = $dashboard_uid;
        $dashboard_chat_userid      = "";
        $dashboard_chat_useruid     = "";
        $dashboard_chat_username    = "";
        $is_dashboard_chat          = "";
        $dashboard_chat_email       = "";
        
        
        if($dashboard_uid !="") {
           $is_dashboard_chat          = "yes";
           $chatuserinfo = ChatUser::where('chat_email', $dashboaed_business->b_email)->where('business_id', $business->id)->first();
           if(!empty($chatuserinfo)) {
                $dashboard_chat_userid      = $chatuserinfo->id;
                $dashboard_chat_useruid     = $chatuserinfo->chatuser_uid;
                $dashboard_chat_username    = $chatuserinfo->name;
                $dashboard_chat_email       = $chatuserinfo->chat_email;
           } else {
                $chatuserinfo = Business::where('uid', $dashboaed_business->uid)->first();
                $dashboard_chat_userid      = $chatuserinfo->id;
                $dashboard_chat_username       = $chatuserinfo->business_name;
                $dashboard_chat_email          = $chatuserinfo->b_email;
           }
        }
        
       // dd($dashboard_chat_username);
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $business->id)->get();
        
        return view('chat.new-chat-now', compact('business_address', 'uid', 'livesitestyleinfo', 'dashboard_chat_email', 'dashboard_uid', 'dashboard_chat_userid', 'dashboard_chat_useruid', 'dashboard_chat_username', 'is_dashboard_chat'));
    }
    
    
}