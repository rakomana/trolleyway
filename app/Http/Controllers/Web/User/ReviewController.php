<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;

class ReviewController extends Controller
{
    /**
     * @var $review
     * @var $product
     * @var $db
    */
    private $review;
    private $product;
    private $db;

    /**
     * @param Review $review
     * @param Product $product
    */
    public function __construct(DB $db, Review $review, Product $product)
    {
        $this->db = $db;
        $this->review = $review;
        $this->product = $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->db->beginTransaction();

        $user = $request->user();

        // buyer(s) only write review if item is added to their cart
        if(!$user->products->contains($product))
        {
            throw new \ErrorException('you have to purchase first in order to write a review for this item');
        }

        //buyer(s) write only one review per item
        if($this->review->where('email', 'LIKE', $user->email) && 
        ($this->review->where('product_id', 'LIKE', $product->id))->exists())
        {
            throw new \ErrorException('you have to purchase first in order to write a review for this item');   
        }

        //buyer(s) only write review if they paid for the item
        if($user->products()->wherePivot('product_id', 'LIKE', $product->id)->wherePivot('status', 'LIKE','Nil')->exists())
        {
            throw new \ErrorException('you have to purchase first in order to write a review for this item');   
        }
        /**
         * Bug buyer(s) cannot write a review if he/she add the same item to cart again and do not pay it
         */

        $review = new $this->review;
        $review->email = $user->email;
        $review->name = $user->name;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->product()->associate($product);
        $review->save();

        $this->db->commit();

        return response()->json(['message' => 'review created']);
    }
}
