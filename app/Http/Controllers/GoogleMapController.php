<?php

namespace App\Http\Controllers;

use App\Model\Plan;
use App\Model\Inbox;
use App\Model\Package;
use App\Model\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GoogleMapController extends Controller
{
    
    protected $secret_key;
    protected $public_key;

    public function __construct() 
    {

        if(env('STRIPE_DEBUG_MODE')){            
            $this->secret_key   = config('services.stripe_sandbox.secret');
            $this->public_key   = config('services.stripe_sandbox.key');
        }else{
            $this->secret_key   = config('services.stripe_live.secret');
            $this->public_key   = config('services.stripe_live.key');
        }
    }

    
    public function google_map($uid){
        
        $business = Business::where('uid', $uid)->first();
        $business_address = $business->b_address;
        return view('googlemap.mygoogle-map', compact('business_address'));

        
    }
    
    public function new_google_map($uid){
        $business = Business::where('uid', $uid)->first();
        $business_address = $business->b_address;

        //new subscription rule start
        $scope = '';
        $should_b_id = 1;
        $is_subscription_ok = false;
        $google_map_key = '';          

        $from   = strtotime($business->package_start_date);
        $from   = date('Y-m-d H:i:s', $from);
        
        $to     = strtotime($business->package_end_date);
        $to     = date('Y-m-d H:i:s', $to);

        $package_end    = strtotime($business->package_end_date);
        $today          = strtotime(date('Y-m-d H:i:s'));

        $package = Package::where('id', $business->package_id)->first();

        $data = json_decode($package->package_rules);
        $inbox = $data->inbox;

        $inbox_count = Inbox::whereBetween('created_at', [$from, $to])->where('business_id', $business->id)->count();

        if($today > $package_end){
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }else{
            $should_b_id = 0;  
            $is_subscription_ok = true;
        }

        if($is_subscription_ok) {
            if($inbox == '-1'){
                $scope = 'Unlimited';
                $is_subscription_ok = true;
            }else{
                $scope = 'Others';
             
                if($inbox > $inbox_count) {
                    $schopeShcedule = $inbox;
                    $is_subscription_ok = true;
                } else {
                   $schopeShcedule = $inbox_count;
                    $is_subscription_ok = false;
                }
            }
        } else {
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }


        if($is_subscription_ok){
            $google_map_key = 'AIzaSyBhDZ-X-FmlL7R9vg4VA7843bel7S4GOac';           
        }else{
            $google_map_key = '';
        }

        //new subscription rule end

        return view('googlemap.new-google-map', compact('business_address', 'google_map_key'));
    }
    
    
}