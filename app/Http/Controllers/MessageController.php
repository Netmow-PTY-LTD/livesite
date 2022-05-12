<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Chat;

class MessageController extends Controller
{
    
    public function messageShow(){
        return view('message.message');
    }
    public function messageSend(Request $request){
        
        //return response()->json($request->all());
        
        $chat = new Chat;
        $chat->message = $request->chatboxtarea;
        $chat->save();
        
        return response()->json($chat);
        
    }
}
