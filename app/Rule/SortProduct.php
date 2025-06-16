<?php

namespace App\Rule;

use Ixudra\Curl\Facades\Curl;

class SortProduct
{
    /**
     *  Get products which where only added to cart 
    */
    public function sort($carts)
    {
        $products = [];

        foreach($carts as $item)
        {
            if($item->pivot->status == 'Nil')
            {
                $products[] = $item;
            }
        }

        return $products;
    }
}
