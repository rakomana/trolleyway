<?php

namespace App\Http\Controllers\Web\Support;

use App\Models\Shop;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Support;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @var $userProduct
     * @var $support
     * @var $product
     * @var $seller
     * @var $admin
     * @var $shop
     * @var $user
     */
    private $userProduct;
    private $support;
    private $product;
    private $seller;
    private $admin;
    private $shop;
    private $user;

    /**
     * Create a new controller instance.
     * @param UserProduct $userProduct
     * @param Support $support
     * @param Product $product
     * @param Seller $seller
     * @param Admin $admin
     * @param Shop $shop
     * @param User $user
     *
     * @return void
     */
    public function __construct(UserProduct $userProduct, Support $support, Product $product, Seller $seller, Admin $admin, Shop $shop, User $user)
    {
        $this->userProduct = $userProduct;
        $this->support = $support;
        $this->product = $product;
        $this->seller = $product;
        $this->admin = $admin;
        $this->shop = $shop;
        $this->user = $user;
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function indexLogin()
    {
        return view('support.auth.login');
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function index(Request $request)
    {
        $users = $this->user->all();
        $products = $this->product->all();
        $shops = $this->shop->all();
        $sellers = $this->seller->all();
        $orders = $this->userProduct->all();

        $pending = collect();
        $completed = collect();

        foreach($orders as $order){
            if($order->status == 'paid'){
                $pending[] = $order;
            }else if($order->status == 'completed'){
                $completed[] = $order;
            }
        }

        return view('support.welcome', compact('users', 'products', 'shops', 'orders', 'sellers', 'completed', 'pending'));
    }

        /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexForgot(Request $request)
    {
        return view('support.auth.forgot-password');
    }

    /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexReset(Request $request)
    {
        return view('support.auth.reset-password');
    }
}