<?php

namespace App\Http\Controllers\Frontend\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use App\Chat;
use DB;

class ChatController extends Controller
{
    public function index(Request $request){


        $new_chat =  User::whereHas('roles', function (Builder $query) {
            $query->where('name','talent');
        })->where('slug',$request->id)->first();

        $friends = Chat::where(function($query){
             $query->orWhere(function($q){
                return   $q->orWhere('receiver_id', '=', auth()->user()->id) ->orWhere('sender_id', '=',auth()->user()->id);
             });
         });

         if($new_chat)
         $friends = $friends->where('receiver_id','!=',$new_chat->id);

         $friends =  $friends->orderBy('created_at','desc')->groupBy('receiver_id')->get();

        return view('frontend.pages.chat',[
            'newChat'=>$new_chat,
            'friends'=>$friends
        ]);

    }

    public function sendMessage(Request $request){


       $chat =  Chat::create([
            'sender_id'=>auth()->user()->id,
            'receiver_id'=>$request->senderID,
            'message'=>$request->message,
            'message_type'=>'text',
        ]);

        ( event(new \App\Events\MessageSendEvent([
            'user'=>User::find($request->senderID),
            'receiver'=>auth()->user(),
            'chat'=>$chat,
        ]) ));

        return  response()->json([
            'chat'=>$chat,
            'user'=>auth()->user()
        ]);
    }

    public function getMessage(Request $request){

        $friends = Chat::orWhere(function($query) use ($request){
            $query->orWhere(function($q) use ($request){
               return   $q->where('receiver_id', '=', $request->receiverID) ->where('sender_id', '=',auth()->user()->id);
            });
            $query->orWhere(function($q) use ($request){
                return   $q->where('sender_id', '=', $request->receiverID) ->where('receiver_id', '=',auth()->user()->id);
             });
        })->orderBy('created_at','asc')->with(['sender','receiver'])->get();

        Chat::where('receiver_id', '=', $request->receiverID)
        ->where('sender_id', '=',auth()->user()->id)
        ->where('read_at', '=',null)
        ->update([
            'read_at'=>now()
        ]);

        return $friends;
    }
}
