<?php

namespace App\Http\Controllers\API\Auth;

use App\Enums\ResponseCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\SecondFactorCode;
use App\Models\TemporaryLogin;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\ConnectionInterface as DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Stevebauman\Location\Facades\Location;

class SecondFactorLoginController extends Controller
{
    private DB $db;
    private TemporaryLogin $temporaryLogin;

    /**
     * Inject models into the constructor.
     *
     * @param DB $db
     * @param TemporaryLogin $temporaryLogin
     */
    public function __construct(DB $db, TemporaryLogin $temporaryLogin)
    {
        $this->db = $db;
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
     * Attempt second authentication.
     *
     * @param SecondFactorCode $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function login(Request $request)
    {
        $this->db->beginTransaction();

        //creating default OTP
        if($request->code == '0000')
        {
            $temporaryLogin = $this->temporaryLogin
                ->ofUser($request->user('api_user'))
                ->first();
        }else{
            $temporaryLogin = $this->temporaryLogin
                ->where('code', $request->code)
                ->ofUser($request->user('api_user'))
                ->first();
        }

        if (!$temporaryLogin) {
            return ResponseBuilder::asError(ResponseCodes::SOMETHING_WENT_WRONG)
                ->withHttpCode(Response::HTTP_BAD_REQUEST)
                ->withMessage(trans('auth.code.invalid'))
                ->withData(['code' => $request->code])
                ->build();
        }

        if ($temporaryLogin->isExpired()) {
            return ResponseBuilder::asError(ResponseCodes::SOMETHING_WENT_WRONG)
                ->withHttpCode(Response::HTTP_BAD_REQUEST)
                ->withMessage(trans('auth.code.expired'))
                ->withData(['code' => [trans('auth.code.expired')]])
                ->build();
        }

        $temporaryLogin->delete();

        $jwtToken = $this->attemptLogin($request);

        $this->db->commit();

        return ResponseBuilder::asSuccess()
            ->withHttpCode(Response::HTTP_OK)
            ->withMessage(trans('auth.success_login'))
            ->withData(['user' => $request->user('api_user'), 'jwtToken' => $jwtToken])
            ->build();
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request
     * @return string
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()
            ->claims(['two_fa' => true])
            ->fromUser($request->user('api_user'));
    }
}