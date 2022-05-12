<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Business;

class ViewYourWidgetController extends Controller
{
    public function viewYourWidget($uid){
        $uid = $uid;

        $business_view = Business::where('uid', $uid)->first();

        return view('view_widgets.view_your_widget', compact('uid', 'business_view'));
        
    }
    
     public function widget_in_your_website($uid){

      $business_view = Business::where('uid', $uid)->first();

        return view('view_widgets.widget_in_your_website', compact('uid', 'business_view'));
    }
     public function mysite(){
        return view('view_widgets.mysite');
    }
}