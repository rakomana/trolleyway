<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\ConnectionInterface as DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Rule\Marketing;

class RegisterController extends Controller
{
    public $db;
    public $user;
    public $marketing;

    /**
     * Inject models into the constructor.
     *
     * @param DB $db
     * @param User $user
     */
    public function __construct(
        DB $db,
        User $user,
        Marketing $marketing
    ) {
        $this->db = $db;
        $this->user = $user;
        $this->marketing = $marketing;
    }

    /**
     * Register a new user .
     *
     * @param RegisterRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $this->db->beginTransaction();

        // Create the user
        $user = new $this->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $jwtToken = JWTAuth::fromUser($user);

        //send email with coupon campaign
        $this->marketing->couponMarketing($user);

        //profile picture that goes along with the model via media library
        $this->db->commit();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_CREATED)
            ->withMessage('User created successfully')
            ->withData(['user' => $user, 'jwtToken' => $jwtToken])
            ->build();
    }
}
