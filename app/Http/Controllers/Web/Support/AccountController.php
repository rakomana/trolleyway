<?php

namespace App\Http\Controllers\Web\Support;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;

class AccountController extends Controller
{
    /**
     * @var $support
     * @var $db
    */
    private $support;
    private $db;

    /**
     * Inject models into the constructor.
     *
     * @param Support $support
     * @param DB $db
     */
    public function __construct(DB $db, Support $support) {
        $this->db = $db;
        $this->support = $support;

    }

    /**
     * Show specific resource in storage.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        $support = $request->user('support');

        return redirect()
            ->back()
            ->withInput()
            ->with($support);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        $this->db->beginTransaction();

        $support = $request->user('support');
        $support->name = $request->name;
        $support->email = $request->email;
        $support->save();

        if($support->isDirty('email')){
            //send email verification
        }

        $this->db->commit();

        return redirect()
            ->back()
            ->withInput()
            ->with('message','User details updated succesfully');
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logs(Request $request)
    {
        $user = $request->user('support')->logs;
       
        return redirect()
            ->back()
            ->withInput()
            ->with($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Media $media
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateProfilePicture(Request $request)
    {
        //update profile picture
        $user = $request->user('support');
        $user->addMedia($request->file('profile_picture'))
            ->toMediaCollection('ProfilePicture');

            return redirect()
                ->back()
                ->withInput()
                ->with('message','Updated Succesfully');
    }

    /**
     * update the specified resource in storage.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updatePassword(Request $request)
    {
        $support = $request->user('support');

        if(Hash::make($request->old_password) != $support->password)
        {
            return redirect()
            ->back()
            ->withInput()
            ->with('error','password does not match!');
        }

        //update the password
        $this->db->beginTransaction();

        $support->password = Hash::make($request->password); //
        $support->save();

        //Notify the user about password change via email
        $this->db->commit();

        return redirect()
            ->back()
            ->withInput()
            ->with('success','User password updated succesfully');
    }

    /**
     * Remove the specified resource in storage.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Request $request)
    {
        $support= $request->user('support');

        $support->delete();

        return redirect()
            ->back()
            ->withInput()
            ->with('message','User deleted succesfully');
    }
}
