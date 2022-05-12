<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Business;

class PaymentController extends Controller
{
    
    
    
    public function payment($uid){
    
        return view('payment.payment-form');

        
    }
    
    
}