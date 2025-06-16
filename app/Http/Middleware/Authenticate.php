<?php

namespace App\Http\Middleware;
use Route; 

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if ($request->is('seller') || $request->is('seller/*')) {
                return route('seller');
            }

            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin');
            }

            if ($request->is('support') || $request->is('support/*')) {
                return route('support');
            }

            return route('login');
        }
    }
}
