<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Nil()
 * @method static Paid()
 * @method static Failed()
 */
final class Payment extends Enum
{
    const Pending = 'pending';
    const Paid = 'paid';
    const Failed = 'failed';
}
