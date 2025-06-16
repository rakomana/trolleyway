<?php

namespace App\Http\Controllers\Web\User;

use App\Enums\Payment;
use App\Models\Order;
use App\Models\Coupon;
use App\Enums\ProductStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\User\Order\Success;

class PaymentController extends Controller
{
    /**
     * @var $order
     * @var $coupon
    */
    private $order;
    private $coupon;


    /**
     * Inject models into the constructor
     * @param Order $order
    */
    public function __construct(Order $order, Coupon $coupon)
    {
        $this->order = $order;
        $this->coupon = $coupon;
    }

    public function cancel()
    {
        return view('user.cancel');
    }

    public function notify()
    {
        return view('user.notify');
    }

    public function payOnDeliverySuccessCallBack(Request $request, string $identity)
    {
        $order = $this->order->whereIdentity($identity)->first();

        $user = $request->user();
        
        $cart = $user->products;
        
        foreach($cart as $item)
        {
            if($item->pivot->order_id != $order->id)
            {
                $item->pivot->status = Payment::Failed;
                $item->pivot->update();
            }else{
                $item->pivot->status = Payment::Paid;
                $item->pivot->track = 'Pay On Delivery';
                $item->pivot->update();

                // Send successful payment notification to the seller
                $user->notify(new Success(
                    $identity
                ));
            }
        }

        if(session()->has('coupon')){
            $coupon = $this->coupon->whereCode(session()->get('coupon')['name']);
            $coupon->delete();
            
            session()->forget('coupon');
        }

        return view('user.success');
    }

    public function paymentSuccessCallBack(Request $request, string $identity)
    {
        $order = $this->order->whereIdentity($identity)->first();

        $user = $request->user();
        
        $cart = $user->products;
        
        foreach($cart as $item)
        {
            if($item->pivot->order_id != $order->id)
            {
                $item->pivot->status = Payment::Failed;
                $item->pivot->update();
            }else{
                $item->pivot->status = Payment::Paid;
                $item->pivot->update();

                #decrement the quantity of product if transaction is complete
                $item->decrement('quantity',$item->pivot->quantity);
                #notify the seller if the quantity of the product is less than two
                if($item->quantity <= 2){
                    #send message via email to notify
                    #$item->user('seller')
                }
                #change the status of the product to Out of Stock if the quantity is zero
                if($item->quantity == 0)
                {
                    $item->status = ProductStatus::OutOfStock;
                }
                #if item is out of stock do not add to cart move it to wish list(item currently not available, cannot add to cart)
                #Do not allow the seller to delete the product instead contact the admin for save delete
                #coupon
                #apply global sale(on new_price percentages)



                // Send successful payment notification to the seller
                $user->notify(new Success(
                    $identity
                ));
            }
        }

        if(session()->has('coupon')){
            $coupon = $this->coupon->whereCode(session()->get('coupon')['name']);
            $coupon->delete();
            
            session()->forget('coupon');
        }

        return view('user.success');
    }
}
