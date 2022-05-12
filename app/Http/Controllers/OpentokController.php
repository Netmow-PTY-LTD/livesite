<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\ChatUser;

class OpentokController extends Controller
{
    public function chatOpentokView(){
        $peer_id            = request()->query('peer_id');
        $chat_user_info = ChatUser::where('peer_id', $peer_id)->first();
        
        return view('chat.opentok-call', compact('chat_user_info'));
    }
    public function cancelCallStatus(Request $request){
        
        //return response()->json($request->all());
        if($request->peer_id){
            
            $client_opentok_info = ChatUser::where('peer_id', $request->peer_id)->first();
            $client_opentok_info->call_status = 'rejected';
            $client_opentok_info->save();
            
            return response()->json($client_opentok_info);
            
        }
        
    }
    
    public function callStatsAccepted(Request $request){
        
        //return response()->json($request->all());
        
        if($request->peer_id){
            
            $client_opentok_info = ChatUser::where('peer_id', $request->peer_id)->first();
            $client_opentok_info->call_status = 'accepted';
            $client_opentok_info->save();
            
            return response()->json($client_opentok_info);
            
        }
    }
    
    public function callStatsCalled(Request $request){
        
        //return response()->json($request->all());
        
        if($request->peer_id){
            
            $client_opentok_info = ChatUser::where('peer_id', $request->peer_id)->first();
            $client_opentok_info->call_status = 'called';
            $client_opentok_info->save();
            
            return response()->json($client_opentok_info);
            
        }
    }
    
    public function callRingingStatus(Request $request){
        
        //return response()->json($request->all());
        
        if($request->peer_id){
            
            $chat_user_opentok_info = ChatUser::where('peer_id', $request->peer_id)->first();
            $chat_user_opentok_info->ringing = 'yes';
            $chat_user_opentok_info->save();
            
            return response()->json($chat_user_opentok_info);
            
        }
    }
    
}
