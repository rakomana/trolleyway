<?php

namespace App\Http\Controllers\Generic;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mail;

class MailController extends Controller
{
    public const SENDER = 'admin@trolleyway.co.za';
    /**
     * @var $user
    */
    public $user;
    public $mail;

    /**
     * Inject Model(s) into the constructor
    */
    public function __construct(User $user, Mail $mail)
    {
        $this->user = $user;
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUsers()
    {
        return response()->json([
            "success" => true,
            "users" => $this->user->all('email')
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMails()
    {
        return response()->json(
            $this->mail->all('sender', 'receiver', 'subject', 'message', 'created_at')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mail = new $this->mail();
        $mail->sender = static::SENDER;
        $mail->receiver = $request->receiver;
        $mail->subject = $request->subject;
        $mail->message = $request->message;
        $mail->save();

        return response()->json([
            'success' => true,
            'message' => 'ok'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
