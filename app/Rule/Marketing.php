<?php

namespace App\Rule;

use App\Models\User;
use App\Models\Coupon;
use App\Notifications\User\Coupon\ShareCoupon;

class Marketing
{
    /**
    * get resource in storage 
    * send email notification
    */
    public function couponMarketing(User $user)
    {
        $coupon = Coupon::first();

        $user->notify(new ShareCoupon($coupon));
    }
}