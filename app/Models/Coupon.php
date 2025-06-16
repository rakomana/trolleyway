<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Coupon as EnumCoupon;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use UUID;
    
    public static function findByCode($code)
    {
        return self::whereCode($code)->first();
    }

    /**
     * Generate a eight character coupon(4 characters plus 4 digit)
     *
     * @param int $codeLength
     * @return string
    */
    public static function generateCode()
    {
        return (strtoupper(Str::random(4)).''.mt_rand(100, 999));
    }

    /**
     * Calculate discount
     *
     * @param $total
     * @return double
    */
    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } else if ($this->type == 'percent') {
            return (($this->value / 100) * $total);
        } else {
            return 0;
        }
    }
}
