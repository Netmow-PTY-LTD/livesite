<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UniqueController extends Controller{
    
    public function sendformData(Request $request){
        return response()->json($request->all());
    }
}