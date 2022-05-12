<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Business;

class BusinessController extends Controller
{
    public function business_info()
    {
        $all_business_data = Business::all();
        
       // dd($all_business_data);
        
        return view('business.all_business', compact('all_business_data'));
        
    }
    
    public function uploadbusinessimage(Request $request){
        
        //header('Access-Control-Allow-Origin: *');
        //header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        //header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
        $data = $request->all();
        

        //$image = $request->file('select_file');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('images/business_images/banner'), $new_name);
        
        //$image = $request->file_path;
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('images'), $new_name);
        
        //$file_name = $image->getClientOriginalName();
        
        return response()->json($data);
    }
    
}
