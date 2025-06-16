<?php

namespace App\Http\Controllers\Generic;

use App\Models\Coupon;
use App\Rule\SortProduct;
use App\Rule\TotalProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * @var coupon
    */
    private $coupon;

    /**
     * Inject models into constructor
     * @param Coupon $coupon
    */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $coupons = $this->coupon->all();

        return view('admin.coupons', compact('coupons')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new $this->coupon();
        $coupon->code= $coupon->generateCode();
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon created');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $coupon = new $this->coupon();
        $coupon->code= $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        session()->forget('coupon');

        return redirect()->back()->with('success', 'Coupon Removed'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon(Request $request, SortProduct $sortProduct, TotalProduct $totalProduct)
    {
        $carts = $request->user()->products;

        //get unpaid products
        $products = $sortProduct->sort($carts);

        //get sum of all unpaid products ()
        $total = $totalProduct->total($products);
        
        if($coupon = $this->coupon->findByCode($request->code))
        {
            $coupon = $coupon->discount($total);
        }

        session()->put('coupon', [
            'name' => $request->code,
            'discount' => $coupon, 
        ]);

        return redirect()->back()->with('success', 'Coupon Applied'); 
    }
}