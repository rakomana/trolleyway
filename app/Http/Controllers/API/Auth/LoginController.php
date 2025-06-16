<?php

namespace App\Http\Controllers\API\Auth;

use App\Enums\ResponseCodes;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\ConnectionInterface as DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\SecondFactorAuthenticationCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\TemporaryLogin;
use Illuminate\Support\Facades\Auth;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private DB $db;
    private User $user;
    private TemporaryLogin $temporaryLogin;

    /**
     * Inject models into the constructor.
     *
     * @param DB $db
     * @param TemporaryLogin $temporaryLogin
     * @param User $user
     */
    public function __construct(DB $db, User $user, TemporaryLogin $temporaryLogin) {
        $this->db = $db;
        $this->user = $user;
        $this->temporaryLogin = $temporaryLogin;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('api_user');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        
        if (!$jwtToken = $this->guard()->claims(['two_fa' => false])->attempt($credentials)) {
            return ResponseBuilder::asError(ResponseCodes::SOMETHING_WENT_WRONG)
                ->withHttpCode(Response::HTTP_BAD_REQUEST)
                ->withMessage(trans('auth.failed'))
                ->withData([$this->username() => [trans('auth.fazZiled')]])
                ->build();
        }

        $user = $this->guard()->setToken($jwtToken)->authenticate();

        //$this->createSecondFactorCode($user, $request);

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage(trans('auth.success_login'))
            ->withData(['user' => $user, 'jwtToken' => $jwtToken])
            ->build();
    }

    /**
     * Create second factor authentication code and
     * delete the previous ones.
     *
     * @param User $user
     * @param Request $request
     * @return void
     */
    protected function createSecondFactorCode(User $user, Request $request)
    {
        $this->db->beginTransaction();

        $user->temporaryLogins()->delete();

        $temporaryLogin = new $this->temporaryLogin();
        $temporaryLogin->account()->associate($user);
        $temporaryLogin->ip_address = $request->ip();
        $temporaryLogin->save();
        
        $this->db->commit();

        $user->notify(new SecondFactorAuthenticationCode($temporaryLogin->code));
    }

    /**
     * Fetch new second factor code.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getNewSecondFactorCode(Request $request)
    {
        $this->createSecondFactorCode($request->user('api_user'), $request);

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage('New second factor authentication code sent')
            ->build();
    }

    /**
     * Invalidate the user token and log the user out.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage('Signed out successfully')
            ->build();
    }

    /**
     * 
     * get logged in user
     */
    public function user(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user('api_user')->id,
        ]);       
    }
}