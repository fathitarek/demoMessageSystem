<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessagesRequest;
use Auth;
use App\Message;
class MessagesController extends Controller
{

  public function __construct() {
     $this->middleware('auth');
    }

public function viewPage($to_id){

  return view('chat.index', compact('to_id'));

}

    public function SendMessage(MessagesRequest $request){
       $input = $request->all();
       $msg = new Message($input);
       $msg->save();
      // return $input;
      // dd($input->content);
/*  $insertMsg=\DB::table('message')->insert(
      ['from_id' =>Auth::user()->id,
      'to_id' => $input['to_id'],
      'content' => $input['content'],
    ]);*/

      //if($insertMsg){return true;}else{return false;}
    }

public function getMessages($from_id,$to_id){
  $msg = Message::oldest()->where('from_id',$from_id)->where('to_id',$to_id)->get();
return response()->json([ 'msg' => $msg ]);

}



}
