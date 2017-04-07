<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index(){
        return view('message.create_new');
    }
    public function create(Request $request){
        $message=new \App\Models\message\Message;
        $message->message = $request->input('new_message');
        $message->save();
        return redirect()->route('message.list');
    }
    public function reply(Request $request){
        $message=new \App\Models\message\Message;
        $message->message = $request->input('reply_message');
        $message->message_id=$request->input('reply');
        $message->save();
        return redirect()->route('message.list');
    }
}
