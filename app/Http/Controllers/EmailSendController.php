<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\MyTestMail;
use Mail;
use GuzzleHttp\Client;

class EmailSendController extends Controller
{
    public function emailSend(){
        
    	$details = [
        	'title' => 'Mail from www.shobuj.com',
        	'body' => 'This is for testing email using smtp'
	    ];
	    
	    Mail::to('shobujsa1993@gmail.com')->send(new MyTestMail($details));
	    
	    dd('Email send success.');
	    /*if( count(Mail::failures()) > 0 ) {

           echo "There was one or more failures. They were: <br />";
        
           foreach(Mail::failures as $email_address) {
               echo " - $email_address <br />";
            }
        
        } else {
            echo "No errors, all sent successfully!";
        }*/
        
    }
    
}
