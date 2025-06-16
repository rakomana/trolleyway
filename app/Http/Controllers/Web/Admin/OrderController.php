<?php

namespace App\Http\Controllers\Web\Admin;

use App\Notifications\User\Order\NotifyUserDelivery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProduct;
use App\Models\Product;
use App\Models\Address;
use App\Models\Shop;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * @var $userProduct
     * @var $product
     * @var $address
     * @var $shop
     * @var $user
    */
    private $userProduct;
    private $product;
    private $address;
    private $shop;
    private $user;

    /**
     * Inject Models into the constructor
     * @param UserProduct $userProduct
     * @param Product $product
     * @param Address $address
     * @param Shop $shop
     * @param User $user
    */
    public function __construct(
        UserProduct $userProduct,
        Product $product,
        Address $address,
        Shop $shop,
        User $user
    )
    {
        $this->userProduct = $userProduct;
        $this->product = $product;
        $this->address = $address;
        $this->shop = $shop;
        $this->user = $user;
    }

    /**
     * Show specific resource  in storage
     * 
     * @param Request $request
     * @param UserProduct $userProduct
     * @return View
    */
    public function show(UserProduct $userProduct, Request $request)
    {
        $product = $this->product->whereId($userProduct->product_id)->first();

        $user = $this->user->whereId($userProduct->user_id)->first();

        $address = $this->address->whereId($user->address_id)->first();
        
        return view('admin.order-details', compact('userProduct', 'product', 'user', 'address'));
    }

    /**
     * Update specific resource in storage
     * 
     * @param Request $request
     * @param UserProduct $userProduct
     * 
     * @return View
    */
    public function update(Request $request, UserProduct $userProduct)
    {
        $userProduct->track = $request->track;
        $userProduct->save();

        $user = $this->user->whereId($userProduct->user_id)->first();

        $user->notify(new NotifyUserDelivery());
        
        return redirect()->back();
    }
}