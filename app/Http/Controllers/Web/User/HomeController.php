<?php

namespace App\Http\Controllers\Web\User;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $items = $product;
        $electronics = $product;
        $shoes = $product;
        $features = $product;
        $best = $product;
        $arrival = $product;

        SEOMeta::setTitle('Trolleyway | Shop better!');
        SEOMeta::setDescription('Spy | Have an eye even when you are not around | with awesome and affordable devices.');
        
        return view('user.welcome', compact('product', 'items', 'electronics', 'shoes', 'features', 'best', 'arrival'));
    }

    /**
     * show all user information
     * 
     * @return 
     */
    public function indexUserData(Request $request)
    {
        $user = $request->user()->load('products, logs');

        return view('user.account', compact('user'));
    }

    /**
     * show all user information
     * 
     * @return 
     */
    public function indexAbout(Request $request)
    {
        $user = $request->user();

        return view('user.about', compact('user'));
    }

    /**
     * show all user information
     * 
     * @return 
     */
    public function indexContact(Request $request)
    {
        $user = $request->user();
        
        return view('user.contact', compact('user'));
    }

        /**
     * show all user information
     * 
     * @return 
     */
    public function empty(Request $request)
    {
        $user = $request->user();
        
        return view('user.empty');
    }
}
