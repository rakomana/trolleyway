<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Shop;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @var $admin
     * @var $user
     * @var $shop
     * @var $seller
     * @var $product
     * @var $userProduct
    */
    private $userProduct;
    private $product;
    private $seller;
    private $admin;
    private $user;
    private $shop;

    /**
     * Create a new controller instance.
     * @param UserProduct $userProduct
     * @param Product $product
     * @param Seller $seller
     * @param Admin $admin
     * @param User $user
     * @param Shop $shop
     * @return void
     */
    public function __construct(Admin $admin, Product $product, Seller $seller, User $user, Shop $shop, UserProduct $userProduct)
    {
        $this->admin = $admin;
        $this->product = $product;
        $this->seller = $seller;
        $this->user = $user;
        $this->shop = $shop;
        $this->userProduct = $userProduct;
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function indexLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function indexRegister()
    {
        return view('admin.auth.register');
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

        return view('admin.welcome', compact('users', 'products', 'shops', 'orders', 'sellers', 'completed', 'pending'));
    }

    /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexForgot(Request $request)
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexReset(Request $request)
    {
        return view('admin.auth.reset-password');
    }
}
