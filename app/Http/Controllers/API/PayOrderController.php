<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Billing\PaymentGateway;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayOrderController extends Controller
{
    public function payOrder(Request $request, PaymentGateway $paymentGateway)
    {
        $order_number = uniqid();

        return $paymentGateway->charge($request->amount, $request->item_name, $order_number);
    }
}