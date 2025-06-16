<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class AuthenticateSecondFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $secondFactorAuth = JWTAuth::parseToken()->getPayload()->get('two_fa');

        return !$secondFactorAuth
            ? ResponseBuilder::asError(Response::HTTP_UNAUTHORIZED)
                ->withHttpCode(Response::HTTP_UNAUTHORIZED)
                ->withMessage(trans('auth.requires_2fa'))
                ->build()
            : $next($request);
    }
}
