<?php

namespace App\Http\Controllers\Generic;

use App\Models\User;
use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;

class ChatController extends Controller
{
    /**
     * @var $message
     * @var $user
     * @var $db
    */
    public $message;
    public $user;
    public $db;

    /**
     * Inject models into the constructor
     * @param Message $message
     * @param User $user
     * @param DB $db
     */
    public function __construct(Message $message, User $user, DB $db)
    {
        $this->message = $message;
        $this->user = $user;
        $this->db = $db;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAllMessages()
    {
    	// return $this->message->with('user')->get();
        return response()->json($this->message->with('user')->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAllUsers()
    {
        return response()->json($this->user->all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        $this->db->beginTransaction();

        $user = $request->user();

        $message = new $this->message();
        $message->message = $request->message;
        $message->user()->associate($user);
        $message->save();
        
        $this->db->commit();
        
        broadcast(new NewMessage($message));

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
