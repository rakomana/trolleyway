<?php

namespace App\Http\Middleware;

use Closure;

class ShopMiddleware
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
        if(!empty($request->user('seller')->shop_id) && $request->user('seller')->shop->status == 'Approved')
        {
            return $next($request);
        }

        return redirect('seller/shop');
    }
}
