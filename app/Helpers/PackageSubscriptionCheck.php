<?php
namespace App\Helpers;
use Illuminate\Http\Request;

use Session;
use Cookie;
use Illuminate\Http\Response;

use App\Model\Package;
use App\Model\Business;

class PackageSubscriptionCheck{
    

    public function packageData($b_uid) {
        
       // return $data = $request->all();
        $business = Business::where('uid', $b_uid)->first();
        return $package = Package::where('id', $business->package_id)->first();
        
    }

   
}