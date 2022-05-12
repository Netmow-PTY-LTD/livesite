<?php

namespace App\Http\Controllers;

use App\Model\Staff;
use App\Model\Country;
use App\Model\Service;
use App\Model\Business;
use App\Model\Timezone;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteStyle;
use Illuminate\Http\Request;
use App\Model\LiveSiteAction;
use App\Model\StaffWeekWorkDay;

class StaffController extends Controller
{
    public function staffInfo($nickname, $staff_uid)
    {
        $businessinfo = Business::where('nickname', $nickname)->first();
        if($businessinfo){
            $staff_details = Staff::where('staff_uid', $staff_uid)->where('business_id', $businessinfo->id)->first();

            if($staff_details){               

                $livesitestyleinfo  = LiveSiteStyle::where('business_id', $businessinfo->id)->first();                
                $livesiteseoinfo    = LiveSiteSeo::where('business_id', $businessinfo->id)->first();                
                $timezone           = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
                $country            = Country::orderBy('country_name', 'asc')->get();
                
                $livesiteactionsinfo = LiveSiteAction::where('business_id', $businessinfo->id)->get();
              

                $response = [       
                    'business_info'         => $businessinfo,
                    'livestyle'             => $livesitestyleinfo,
                    'seo'                   => $livesiteseoinfo, 
                    'actions'               => $livesiteactionsinfo                    
                ];
                   
                $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
                $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
                $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
                 
                $arr = array();
                
                $arr = $businessinfo;
                $arr['business_id'] = $businessinfo->id;
                $arr['actions']     = $livesiteactionsinfo;
                $arr['seo']         = $livesiteseoinfo;
                $arr['livestyle']   = $livesitestyleinfo;
                $arr['service']     = array();
                $allbusinessinfo    = $arr;

                $service    = array();
                $service    = explode(',', $staff_details->services);
                    $arb =  array();
                    foreach($service as $key => $data){
                        $staff = Service::where('id', $data)->first();
                        if(gettype($staff) == 'object') {
                            $arb[$key] = Service::where('id', $data)->first();
                        }
                    }
                    
                    $arr['service'] = $arb;
                    
                    $arr['staff_country_details']   = Country::where('id', $staff_details->country_id)->first();
                    $arr['staff_weekworkday']       = StaffWeekWorkDay::where('staff_id', $staff_details->id)->where('status', 1)->get();

                $b_services = $arr;
                
                // dd($staff_details->country_id);

                $uid = $businessinfo->uid;
                                
                return view('schedule.staff_booking',  compact('staff_details', 'b_services',  'allbusinessinfo', 'uid' ,'timezone', 'country'));
            }else{
                return redirect()->route('admin.booking', $nickname);
            }
        }else{
            return redirect()->route('admin.booking', $nickname);
        }
        
    }
}
