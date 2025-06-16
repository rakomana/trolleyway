<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Requests\Seller\Product\ProductStoreRequest;

class ProductController extends Controller
{
    private $review;
    private $product;
    private $seller;
    private $db;
    
    /**
     * Inject models into the constructor
     * @param Product $product
     */
    public function __construct(Review $review, Product $product, Seller $seller, DB $db)
    {
        $this->review = $review;
        $this->product = $product;
        $this->seller = $seller;
        $this->db = $db;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        SEOMeta::setTitle('GuineaFowl Amazing Future Technologies');
        SEOMeta::setDescription('Spy | Have an eye even when you are not around | with awesome and affordable devices.');

        //filter according to category
        $new = $product->where('category', 'new');
        $featured = $product->where('category', 'featured');
        $offer = $product->where('category', 'offer');
        
        return view('user.welcome', compact('product', 'new', 'featured', 'offer'));
    }

    /**
     * Create product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->db->beginTransaction();

        $shop = $request->user('seller')->shop;
        $image = array();
      
        $product = new $this->product();
        $product->url = $request->url;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->status = $request->status;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->new_price = $request->new_price;
        $product->old_price = $request->old_price;
        $product->meta_title = $request->meta_title;
        $product->description = $request->description;
        $product->youtube_link = $request->youtube_link;
        $product->meta_description = $request->meta_description;

        $items = $request->file('image');

        $dir = $shop->shop_name;

        Storage::cloud()->makeDirectory($dir);

        foreach($items as $item)
        {
            $name = $item->getClientOriginalName();
            Storage::cloud()->put('p/'.$dir.'/'.$name, fopen($item, 'r+'), 'public');
            $image[] = 'p/'.$shop->shop_name.'/'.$name;
        }

        $product->image = json_encode($image);
        $product->shop()->associate($shop);

        $product->save();

        $this->db->commit();

        return view('seller.success-product');
    }

    /**
     * update resource in storage
     * @return response
    */
    public function update(Product $product, Request $request)
    {
        $product->url = $request->url;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->status = $request->status;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->new_price = $request->new_price;
        $product->old_price = $request->old_price;
        $product->meta_title = $request->meta_title;
        $product->description = $request->description;
        $product->youtube_link = $request->youtube_link;
        $product->meta_description = $request->meta_description;
        $product->save();

        return back()->with('success', 'updated succesfully');
    }
}