<?php
namespace App\Helpers;
use Illuminate\Http\Request;

use Session;
use Cookie;
use Illuminate\Http\Response;


class SpamFilter{




        //$str = "This Is A Sample String Of Hello World";

        //$words = array('sdfsdf', 'A'); 
        //$ifmatching_atleast_word_count = 1; 

        //filter($str, $words, $ifmatching_atleast_word_count);

    public  function  filter($str, $words, $ifmatching_atleast_word_count) {
            
             $is_really_spam = false;
             $countword = 0;
            
            foreach($words as $key => $value){
                //echo $value[$key];
                if (str_contains($str, $value)) { 
                    $countword++;
                } 
                //echo $value;
            }
            
            
            if($countword >= $ifmatching_atleast_word_count) {
                $is_really_spam = true;
            } else {
                $is_really_spam = false;
            }
            
            
            return $is_really_spam;

    }


    
}
