<?php

namespace App\Http\Controllers\Web\Seller;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Seller\Account\UpdateUserRequest;
use App\Http\Requests\Seller\Account\ChangePasswordRequest;

class AccountController extends Controller
{
    private Seller $seller;
    private DB $db;

    /**
     * Inject models into the constructor.
     *
     * @param Seller $seller
     * @param DB $db
     */
    public function __construct(DB $db, Seller $seller) {
        $this->db = $db;
        $this->seller = $seller;

    }

    /**
     * Show specific resource in storage.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        $seller = $request->user('seller');

        return redirect()
            ->back()
            ->withInput()
            ->with($seller);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $this->db->beginTransaction();

        $seller = $request->user('seller');
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->save();

        if($seller->isDirty('email')){
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
        $user = $request->user('seller')->logs;
       
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
        $user = $request->user();
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
        $seller = $request->user('seller');

        if(Hash::make($request->old_password) != $seller->password)
        {
            return redirect()
            ->back()
            ->withInput()
            ->with('error','password does not match!');
        }

        //update the password
        $this->db->beginTransaction();

        $seller->password = Hash::make($request->password); //
        $seller->save();

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
        $seller= $request->user('seller');

        $seller->delete();

        return redirect()
            ->back()
            ->withInput()
            ->with('message','User deleted succesfully');
    }
}
