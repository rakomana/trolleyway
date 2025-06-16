<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Rule\SortProduct;
use App\Rule\TotalProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;

class PageController extends Controller
{
    public function notFound()
    {
        return view('user.404');
    }

    public function category(string $category)
    {
        if ($category == 'all') {
            $product = Product::all();
        } else {
            $product = Product::whereCategory($category)->get();
        }

        SEOMeta::setTitle('Trolleyway Online');
        SEOMeta::setDescription('Online Marketplace');

        //filter according to category

        return view('user.category', compact('product'));
    }

    public function checkout(Request $request, SortProduct $sortProduct, TotalProduct $totalProduct)
    {
        $stores = Store::all();

        $user = $request->user();

        $products = $user->products;

        //get user's address
        $address = $user->address;

        $cart = $sortProduct->sort($products); 
        $total = $totalProduct->total($cart);

        $order_num = uniqid();

        $order = new Order();
        $order->identity = $order_num;
        $order->save();

        foreach($cart as $item)
        {
            if($item->pivot->status == 'Nil' || $item->pivot->status == 'failed')
            {
                $item->pivot->order_id = $order->id;
                $item->pivot->update();
            }
        }

        return view('user.checkout', compact('stores', 'order_num', 'cart', 'total', 'address'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function detail(Product $product)
    {
        SEOMeta::setTitle($product->meta_title);
        SEOMeta::setDescription($product->meta_description);

        $reviews = $product->reviews;
        $products = Product::all();
        
        return view('user.detail', compact('product', 'reviews', 'products'));
    }

    public function faq()
    {
        return view('user.faq');
    }

    public function myWishList()
    {
        $products = Product::all();
        
        return view('user.my-wishlist', compact('products'));
    }

    public function productComparison()
    {
        return view('user.product-comparison');
    }

    public function shoppingCart(Request $request, SortProduct $sortProduct)
    {
        $carts = $request->user()->products;
        $products = [];

        if(count($carts) == 0)
        {
            return view('user.shopping-cart', compact('products'));
        }

        //get only unpaid product using product sort rule
        $products = $sortProduct->sort($carts);
        
        return view('user.shopping-cart', compact('products'));
    }

    public function termsConditions()
    {
        return view('user.terms-conditions');
    }

    public function trackOrders()
    {
        return view('user.track-orders');
    }
}
