<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class ProductController extends Controller
{
    private $product;

    /**
     * Inject models into the constructor
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        $new = $product->where('category', 'new');
        $featured = $product->where('category', 'featured');
        $offer = $product->where('category', 'offer');

        return response()->json([
            'success' => true,
            'items' => $product
        ]);
    }

    /**
     * Display specific resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(['product' => $product]);
    }

    /**
     * place an order on a specific product
     */
    public function order(OrderStoreRequest $request, Product $product, string $quantity)
    {
        $user = $request->user('api_user');

        $user->products()->attach($product, array(
            'phone_number' => $request->phone_number,
            'review' => $request->review,
            'location' => $request->location,
            'quantity' => $quantity,
        ));

        return response()->json([
            'success' => true,
            'message' => 'Order is placed succesfully'
        ]);
    }

    /**
     * 
     */
    public function updateOrder(Request $request)
    {
        $user = $request->user('api_user');

        $order = $user->products()->get();

        dd($order);
        /*
        foreach($order as $orders)
        {
            dd($order);
            /*
            $order
            ->wherePivot('id', $order->id)
            ->updateExistingPivot($user, array('status' => 1), true);
        } */

        return response()->json('Order placed succesfully');
    }
}
