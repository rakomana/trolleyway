<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $user;
    private $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product, User $user)
    {
        $this->product = $product;
    }

    /**
     * show all user information
     * 
     * @return 
     */
    public function indexUserData(Request $request)
    {
        $user = $request->user('api_user')->load('products, logs');

        return response()->json(['user' => $user]);
    }
}
