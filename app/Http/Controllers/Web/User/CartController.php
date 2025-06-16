<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Enums\VerificationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;

class CartController extends Controller
{
    /**
     * @var $order
     * @var $user
     * @var $store
     * @var $product
     */
    private $user;
    private $store;
    private $product;
    private $order;

    /**
     * Inject models into the constructor
     * @param Order $order
     * @param User $user
     * @param Store $store
     * @param Product $product
     */
    public function __construct(Order $order, User $user, Store $store, Product $product)
    {
        $this->product = $product;
        $this->store = $store;
        $this->user = $user;
        $this->order = $order;
    }
    
    /**
     * place an order on a specific product
     */
    public function order(OrderStoreRequest $request, Product $product)
    {
        $user = $request->user();

        if ($user->products()->wherePivot('product_id', 'LIKE', $product->id)->wherePivot('status', '!=','paid')->exists()) {
            return redirect()->back()->with('error', 'Item already added to cart');
        }
        
        $user->products()->attach($product, array(
                                            'phone_number' => $request->phone_number,
                                            'review' => $request->review,
                                            'location' => $request->location,
                                            'quantity' => $request->quantity,
                                            'status' => VerificationStatus::Nil));
        
        return redirect()->back()->with('success', 'Item added to Cart');
    }

    /**
     * update a resource from storage
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart = $request->user()->products->where('status', '!=', 'paid');

        $order_number = uniqid();

        $order = new $this->order();
        $order->identity = $order_number;
        $order->store = $request->store;
        $order->save();

        foreach ($cart as $item) {
            if ($item->pivot->status == 'Nil') {
                $item->pivot->order_id = $order->id;
                $item->pivot->update();
            }
        }

        return view('user.checkout', compact('cart', 'order_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Product $product)
    {
        $user = $request->user();
        
        $user->products()->detach($product);

        return redirect()->back()->with('success', 'Item removed from cart');
    }
}
