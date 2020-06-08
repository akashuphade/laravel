<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\User;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //get inbox
    public function index()
    {
        //Get messages received 
        $messages = Message::where([['user_id_to','=', Auth::id()],['deleted','=',0]])->with('fromUser')->orderBy('created_at', 'desc')->get();
        return view('home')->with('messages', $messages);
    }

    /**
     * @Brief: It will show the message received
     * 
     * @Return: view showing message content
     */
    public function show(int $id, bool $deleted=false)
    {
        $message = Message::with('fromUser')->find($id);
        
        //Set it as read 
        $message->read = true;
        $message->save();

        return view('view')->with(['message'=>$message, 'deleted'=>$deleted]);
    }

    /**
     * @Brief: This will return the view for sending messages
     */
    public function createMessage(int $id=0, string $subject='')
    {

        //Get users list to send message
        if($id !==0) {
          $users = User::where('id', $id)->get();  
        } else {
            $users = User::where('id', '<>', Auth::id())->get();
        }
        
        if(!empty($subject))
            $subject = 'RE: '.$subject;

        return view('send')->with(['users'=>$users, 'subject'=>$subject]);
    }

    /**
     * @Brief: This will send the message to the user
     */
    public function sendMessage(MessageRequest $request)
    {
        //Get the data and save to the table
        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('body');

        $message->save();

        return redirect('home')->with('success', 'Message sent successfully!!!');
    }

    /**
     * @Brief: This method will delete the message
     */
    public function destroy($id)
    {
        //Get the record
        $message = Message::find($id);
        $message->deleted = true;
        $message->save();

        return redirect('home')->with('success', 'Message deleted successfully!!!');
    }

    /**
     * @Brief: Get the only deleted messages
     */
    public function getDeleted()
    {
        $messages = Message::where([['user_id_to','=', Auth::id()],['deleted','=',1]])->with('fromUser')->get();
        return view('deleted')->with('messages', $messages);
    }

    /**
     * @Brief: Get sent messages
     */
    public function getSent()
    {
        $messages = Message::where('user_id_from', Auth::id())->with('toUser')->orderBy('created_at', 'desc')->get();
        return view('sent')->with('messages', $messages);
    }

    /**
     * @Brief: Get sent details
     */
    public function getSentDetails($id)
    {
        $message = Message::with('toUser')->find($id);
        return view('sentDetail')->with('message', $message);
    }

    public function undeleteMessage(int $id)
    {
        $message = Message::find($id);
        $message->deleted = false;
        $message->save();

        return redirect('home')->with('success', 'Message recovered successfully');
    }
}
