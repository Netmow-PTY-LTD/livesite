<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteAction;
use App\Model\RulesRegulation;


class RulesRegulationController extends Controller
{
    public function rules_regulation($uid){
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
        
        $rule_regulation = RulesRegulation::where('business_id', $businessinfo->id)->first();
        
        //dd($rule_regulation);
        
        return view('rules_regulation.rules_regulation', compact('allbusinessinfo', 'rule_regulation'));
    }
    
}