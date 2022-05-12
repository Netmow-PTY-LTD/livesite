<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;

use Twilio\Rest\Client;

use App\Model\Staff;
use App\Model\Country;
use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteAction;
use App\Model\LiveSiteToken;
use App\Model\BusinessWeekWorkDay;
use App\Model\MiynThemeSection;



class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index(){
        
        if(isset($_COOKIE["user_acc_uid"]) && ($_COOKIE["user_acc_uid"] !="")){
            $uid = $_COOKIE["business_uid"];
            $business   = Business::where('uid', $uid)->first();
            //dd($business);
            return \Redirect::to(config('app.live_url').'/site/'.$business->nickname);
        }
        
        return view('welcome');
        
    }

    public function newlivesite($nickname){
       
        $businessinfo   = Business::where('nickname', $nickname)->first();
    

        if(!$businessinfo){
            return \Redirect::to(config('app.live_url'));
        }
        $uid = $businessinfo->uid;

        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
    
        $business_week_work_days = BusinessWeekWorkDay::where('business_id', $businessinfo->id)->get();

        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['livestyle'] = $livesitestyleinfo;
         
        $business_address = $businessinfo->b_address;

        $allbusinessinfo = $arr;
        
        $staffs = Staff::where('business_id', $businessinfo->id)->get();
        $miyn_theme_section  = MiynThemeSection::where('business_id', $businessinfo->id)->first();


        
        //dd($miyn_theme_section);
        
        $uid = $businessinfo->uid;
        $global_business_info = $businessinfo;
        $global_business_info['country'] = Country::where('id', $global_business_info->b_country_id)->first();
        
        //return view('livesite.themes.view_your_widget',  compact('business_week_work_days', 'allbusinessinfo', 'uid', 'business_address', 'staffs'));

        return view('livesite.'.$businessinfo->default_theme,  compact('business_week_work_days', 'miyn_theme_section', 'allbusinessinfo', 'uid', 'global_business_info', 'business_address', 'staffs'));

        
    }
    
    public function livesite($nickname){
       
        $businessinfo   = Business::where('nickname', $nickname)->first();
    

        if(!$businessinfo){
            return \Redirect::to(config('app.live_url'));
        }
        $uid = $businessinfo->uid;

        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
    
        $business_week_work_days = BusinessWeekWorkDay::where('business_id', $businessinfo->id)->get();

        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['livestyle'] = $livesitestyleinfo;
         
        $business_address = $businessinfo->b_address;

        $allbusinessinfo = $arr;
        
        $staffs = Staff::where('business_id', $businessinfo->id)->get();
        $miyn_theme_section  = MiynThemeSection::where('business_id', $businessinfo->id)->first();


        
        //dd($miyn_theme_section);
        
        $uid = $businessinfo->uid;
        $global_business_info = $businessinfo;
        $global_business_info['country'] = Country::where('id', $global_business_info->b_country_id)->first();
        
        //return view('livesite.themes.view_your_widget',  compact('business_week_work_days', 'allbusinessinfo', 'uid', 'business_address', 'staffs'));

        return view('livesite.'.$businessinfo->default_theme,  compact('business_week_work_days', 'miyn_theme_section', 'allbusinessinfo', 'uid', 'global_business_info', 'business_address', 'staffs'));

        
    }
    
    public function livesitebad($nickname){
       
        $businessinfo   = Business::where('nickname', $nickname)->first();
    

        if(!$businessinfo){
            return \Redirect::to(config('app.main_url'));
        }
        $uid = $businessinfo->uid;

        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
    
        $business_week_work_days = BusinessWeekWorkDay::where('business_id', $businessinfo->id)->get();

        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
       
        
         
        $business_address = $businessinfo->b_address;

        $allbusinessinfo = $arr;
        
        //dd($allbusinessinfo->country->country_code);

        return view('livesite.bad.'.$businessinfo->default_theme,  compact('business_week_work_days', 'allbusinessinfo', 'uid', 'business_address'));

        
    }
    
    public function livesiteNew($nickname){
        $businessinfo   = Business::where('nickname', $nickname)->first();
        $uid = $businessinfo->uid;

        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        //$arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
       
        $allbusinessinfo = $arr;
        return view('live.site2',  compact('allbusinessinfo', 'uid'));

    }
    
    public function sendsms(){
        
        return redirect()->back();
        
        $account_sid    = getenv("TWILIO_SID");
        $auth_token     = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number  = getenv("TWILIO_NUMBER");
        //dd($twilio_number);
        $client         = new Client($account_sid, $auth_token);
        
        $message    = 'Dear Dev, your appointment request has been received.';
        $phone      = '+8801409400635';

        $data = $client->messages->create(
                       $phone, array(
                           'from' => $twilio_number,
                           'body' => $message,
                        )
                );
        
        dd('sms send success...');
        

    }
    
    public function livesitelogin(Request $request){
        
        //return response()->json($request->all());
        
        $user    = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json(['status'=>'error', 'message' => 'You do not have an account'.'<br><a href="'.config('app.main_url').'/register">Create an account</a>']);
         }
         
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['status'=>'error', 'message' => 'Login Fail, please check password']);
        }
         
        $business = Business::where('user_acc_id', $user->id)->first();
         
        $request->session()->reflash();
        
        return response()->json([
            'status'=>'success',
            'data' => $user,
            'nickname' => $business->nickname,
            'user_acc_uid' => $user->accuid,
            'business_uid' => $business->uid
        ]);
        
        
    }
    
    public function testPage(){
        
    return view('test-page');
    }

    public function liveSiteTest(){
        
        return view('test');
    }
}