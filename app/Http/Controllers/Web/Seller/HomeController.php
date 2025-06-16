<?php

namespace App\Http\Controllers\Web\Seller;

use App\Models\Order;
use App\Models\User;
use App\Enums\Wallet;
use App\Models\Seller;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @var $userProduct
     * @var $seller
     * @var $user
     * @var $order
     */
    private $userProduct;
    private $seller;
    private $user;
    private $order;

    /**
     * Inject models into the constructor
     * 
     * @param UserProduct $userProduct
     * @param Seller $seller
     * @param User $user
     * @param Order $order
     * @return void
     */
    public function __construct(UserProduct $userProduct, Seller $seller, User $user, Order $order)
    {
        $this->userProduct = $userProduct;
        $this->seller = $seller;
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function indexLogin()
    {
        return view('seller.auth.login');
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function indexRegister()
    {
        return view('seller.auth.register');
    }

    /**
     * Return login page
     * 
     * @return 
     */
    public function index(Request $request)
    {
        $seller = $request->user('seller');

        $shop = $seller->shop;

        $products = $shop->product;

        $users = $this->user->all();

        $order_info = $this->order->all();
        
        /** */
        $collect = $this->userProduct->all();

        $products = $shop->product;

        $complete = collect();
        $pending = collect();
        $orders = collect();
        $revenue = collect();
        $sales = collect();

        foreach($collect as $collection){
            foreach($products as $product){
                if($collection->product_id == $product->id){
                    $orders[] = $collection;
                    if($collection->status == 'paid'){
                        $pending[] = $collection;
                    }else if($collection->status == 'completed'){
                        $complete[] = $collection;
                    }
                }
            }
        }

        if(count($complete) > 0)
        {
            $revenue = $this->getShopRevenue($complete, $order_info, $revenue);
            $sales = $this->getShopSale($complete, $order_info, $sales);
        }

        return view('seller.welcome', compact('seller', 'shop', 'products', 'users', 'orders', 'pending', 'complete', 'revenue', 'sales'));
    }

    /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexForgot(Request $request)
    {
        return view('seller.auth.forgot-password');
    }

    /**
     * Return forgot page
     * 
     * @return 
     */
    public function indexReset(Request $request)
    {
        return view('seller.auth.reset-password');
    }

    /**
     *  
    */
    public function withdraw()
    {

    }

    /**
     * Get all completed order(s) which are not yet paid to the seller
     * @return Array
    */
    private function getShopRevenue($complete, $order_info, $revenue)
    {
        //when the order(s) is completed, check if the seller withdrew/requested the cash on orders table
        foreach($complete as $completed){
            foreach($order_info as $info ){
                if($completed->order_id == $info->id){
                    if($info->status == Wallet::Processed){
                        $revenue[] = $completed;
                    }
                }
            }
        }

        return $revenue;
    }

    /**
     * Get all completed order(s) which are not yet paid to the seller
     * @return Array
    */
    private function getShopSale($complete, $order_info, $sales)
    {
        foreach($complete as $completed){
            foreach($order_info as $info ){
                if($completed->order_id == $info->id){
                    if($info->status == Wallet::Pending || $info->status == Wallet::Processing){
                        $sales[] = $completed;
                    }
                }
            }
        }
        
        return $sales;
    }
}
