<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Rule\TotalProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    private $user;
    private $store;
    private $product;
    private $totalProduct;

    /**
     * Inject models into the constructor
     * @param User $user
     * @param Store $store
     * @param Product $product
     * @param TotalProduct $totalProduct
     */
    public function __construct(
        User $user,
        Store $store,
        Product $product,
        TotalProduct $totalProduct
    ) {
        $this->totalProduct = $totalProduct;
        $this->product = $product;
        $this->store = $store;
        $this->user = $user;
    }

    /**
     * Return user's cart.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $carts = $request->user('api_user')->products;
        $cart = null;

        foreach ($carts as $item) {
            if ($item->pivot->status == 'Nil') {
                $cart[] = $item;
            }
        }

        if ($cart == null) {
            return response()->json([
                'success' => false, 'items' => [], 'total' => 0, 'sum' => 0
            ]);
        }

        $sum = $this->totalProduct->total($cart);

        return response()->json([
            'success' => true, 'items' => $cart, 'total' => count($cart),
             'sum' => $sum
        ]);
    }
}
