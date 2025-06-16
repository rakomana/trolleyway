<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Illuminate\Database\ConnectionInterface as DB;

class AccountController extends Controller
{
    private User $user;
    private DB $db;

    /**
     * Inject models into the constructor.
     *
     * @param Media $media
     * @param User $user
     * @param DB $db
     */
    public function __construct(DB $db, User $user)
    {
        $this->db = $db;
        $this->user = $user;
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

        $user = $request->user('api_user');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($user->isDirty('email')) {
            //send email verification
        }

        $this->db->commit();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage("The user is succesfully updated")
            ->withData(["user" => $user])
            ->build();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logs(Request $request)
    {
        $user = $request->user()->logs;

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage("User logs succesfully fetched")
            ->withData(["logs" => $user])
            ->build();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateProfilePicture(Request $request)
    {

        //Upload profile picture to storage
        $user = $request->user('api_user');

        $file  = public_path('uploads/user/pictures/') . $user->avatar;

        if (File::exists($file)) {
            $avatar = $request->file('avatar');
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move('uploads/user/pictures/', $avatar_name);
            $user->avatar = $avatar;

            //Found existing file then delete
            File::delete($file);  // or unlink($filename);
        }

        return response()->json([
            'success' => true,
            'message' => 'avatar uploaded succesfully'
        ]);
    }

    /**
     * update the specified resource in storage.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updatePassword(Request $request)
    {
        //update the password
        $this->db->beginTransaction();

        $user = $request->user();
        $user->password = Hash::make($request->password); //
        $user->save();

        //Notify the user about password change via email
        $this->db->commit();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage("User password updated succesfully")
            ->build();
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param OrganizationUpdateRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        $user->delete();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage("User account succesfully deleted")
            ->build();
    }
}
