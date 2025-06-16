<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Admin\Account\UpdateAdminRequest;
use App\Http\Requests\Admin\Account\ChangePasswordRequest;

class AccountController extends Controller
{
    private Admin $admin;
    private DB $db;

    /**
     * Inject models into the constructor.
     *
     * @param Admin $admin
     * @param DB $db
     */
    public function __construct(DB $db, Admin $admin) {
        $this->db = $db;
        $this->Admin = $admin;

    }

    /**
     * Show specific resource in storage.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        $admin = $request->user('admin');

        return redirect()
            ->back()
            ->withInput()
            ->with($admin);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateAdminRequest $request)
    {
        $this->db->beginTransaction();

        $Admin = $request->user('admin');
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->save();

        if($Admin->isDirty('email')){
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
        $user = $request->user('admin')->logs;
       
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
        $user = $request->user('admin');
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
    public function updatePassword(ChangePasswordRequest $request)
    {
        $Admin = $request->user('admin');

        if(Hash::make($request->old_password) != $Admin->password)
        {
            return redirect()
            ->back()
            ->withInput()
            ->with('error','password does not match!');
        }

        //update the password
        $this->db->beginTransaction();

        $Admin->password = Hash::make($request->password); //
        $Admin->save();

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
        $Admin= $request->user('admin');

        $Admin->delete();

        return redirect()
            ->back()
            ->withInput()
            ->with('message','User deleted succesfully');
    }
}
