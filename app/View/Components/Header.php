<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Rule\SortProduct;
use App\Rule\TotalProduct;

class Header extends Component
{
    /**
     * Create a new component instance.
     * Inject rule into the constructor
     *
     * @return void
     */
    public function __construct(SortProduct $sortProduct, TotalProduct $totalProduct)
    {
        $this->sortProduct = $sortProduct;
        $this->totalProduct = $totalProduct;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $products = [];
        $total = 0;

        //if user is not logged in return this
        if(!auth()->check())
        {
            return view('user.components.header', compact('products'));
        }

        $carts = auth()->user()->products;

        if(count($carts) == 0)
        {
            return view('user.components.header', compact('products', 'total'));
        }

        $products = $this->sortProduct->sort($carts);
        $total = $this->totalProduct->total($products);

        if($total == 0)
        {
            $total = 0;
        }

        return view('user.components.header', compact('products', 'total'));
    }
}
