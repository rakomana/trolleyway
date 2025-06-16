<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Fixed()
 * @method static Percent()
 */
final class Coupon extends Enum
{
    const Fixed = 'fixed';
    const Percent = 'percent';
}
