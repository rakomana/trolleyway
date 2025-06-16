<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;

class SearchController extends Controller
{
    /**
     * @var $product
    */
    public $product;

    /**
     * Inject model(s) into the constructor
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
    public function searchProducts(Request $request)
    {
        $value = $request->value;

        $product = $this->product->query()
            ->where('name', 'LIKE', "%{$value}%") 
            ->get();

        session()->put('search', true);

        SEOMeta::setTitle('Trolleyway Online');
        SEOMeta::setDescription('Online Marketplace');

        return view('user.category', compact('product'));
    }
}
