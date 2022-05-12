<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteAction;
use App\Model\Client;
use App\Model\LiveSiteToken;

use App\Mail\SendClientLiveSiteUrl;
use Mail;

class ClientGetCodeController extends Controller
{
    public function client_get_code($uid)
    {
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr                = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions']     = $livesiteactionsinfo;
        $arr['seo']         = $livesiteseoinfo;
        $arr['livestyle']   = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;

        return view('client_get_code.client_get_code', compact('allbusinessinfo'));
        
    }
    
    public function client_get_newcode($uid)
    {
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr                = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions']     = $livesiteactionsinfo;
        $arr['seo']         = $livesiteseoinfo;
        $arr['livestyle']   = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;

        return view('client_get_code.client_get_newcode', compact('allbusinessinfo'));
        
    }
    
    public function sendLiveUrl(Request $request)
    {
        
        //return response()->json($request->all());
        
        $business = Business::where('uid', $request->b_uid)->first();
        $client   = Client::where('email', $request->email)->where('business_id', $business->id)->first();
        
        $client_name = strstr($request->email, '@', true);

        if(empty($client)){
            $length                     = 15;    
    	    $client_uid                 =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
    	    
            $client                     = new Client;
            $client->cl_uid             = $client_uid;
            $client->business_id        = $business->id;
            $client->firstname          = $client_name;
            $client->email              = $request->email;
            $client->status             = 'Customer';
            $client->created_at         = now();
            $client->route_controller   = $request->url();
            $client->save();
            //return response()->json($client);
            //$client->business_id= $business->id;
            //$client->country_id = $request->client_country_id;
            //$client->firstname  = $request->c_first_name;
            //$client->lastname   = $request->c_last_name;
            //$client->phone      = $phone;
            //$client->note       = $request->c_note;
            //$client->status     = 'Customer';
            
        }

        try {
            $url = $request->url();
            $routeName = \Route::currentRouteName();

            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);

            $client->route_controller  = 'Controller Action : '.$controllerAction.' URL '.$url;
            $client->save();
            
        } catch (\Exception $e) {
            \Log::info('error find when route detials obtain');
        }
        
        $len                   = 20;    
    	$live_token       =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
    	
        $live_site_token            = new LiveSiteToken;
        $live_site_token->business_id = $business->id;
        $live_site_token->client_id = $client->id;
        $live_site_token->token     = $live_token;
        $live_site_token->save();
        
        
        $email_send_message = '';
        try {
            Mail::to($client->email)->send(new SendClientLiveSiteUrl($client, $live_site_token, $business));
        } catch (\Exception $e) {
            $email_send_message = $e;
        }
        
        return response()->json([
            'message' => 'Mail send success.',
            'value'   => $email_send_message
        ]);
        
    }
    
    public function liveSiteToken($live_site_token){

        $client = Client::where('live_site_token', $live_site_token)->first();
        $business = Business::where('id', $client->business_id)->first();
        
        if(!$client){
            //return \Redirect::to('https://miyn.app');
            return \Redirect::to(\Config::get('app.main_url'));
        }else{
            
        }
        
        return response()->json($live_site_token);
    }
    
}

