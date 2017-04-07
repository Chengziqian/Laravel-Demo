<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index(){
        $messages=\App\Models\message\Message::where('message_id','=',0)->get();
        $replies=\App\Models\message\Message::where('message_id','!=' , 0)->get();
        return view('message.list',['messages' => $messages,'replies'=>$replies]);
    }
    public function delete(Request $request){
        if($request['del_index']==null){
        \App\Models\message\Message::find($request['del'])->delete();
    }
    else{
        \App\Models\message\Message::find($request['del_index'])->delete();
        \App\Models\message\Message::where('message_id','=',$request['del_index'])->delete();
    }
        return redirect()->route('message.list');
    }
}
