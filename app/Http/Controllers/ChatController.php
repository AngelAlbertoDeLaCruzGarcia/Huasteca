<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Events\NewChatMessage;
use Stevebauman\Purify\Facades\Purify;


class ChatController extends Controller
{
    public function rooms(Request $request)
    {
        return ChatRoom::all();
    }
    public function messages(Request $request,$roomId)
    {
        return ChatMessage::where('chat_room_id',$roomId)/*
        ->whereIn(
            'user_id',[Auth::id(),1,26]
        )*/
        ->with('user')
        ->orderBy('created_at','asc')
        ->get();
    }
    public function newMessage(Request $request,$roomId)
    {
        if($request->message)
        {
            $cleaned = Purify::clean($request->message);
            $newMessage = new ChatMessage();
            $newMessage->user_id      = Auth::id();
            $newMessage->chat_room_id = $roomId;
            $newMessage->message      = $cleaned;
            $newMessage->save();
            ///broadcast(new NewChatMessage($newMessage))->toOthers();
            return $newMessage;
        }
    }
}
