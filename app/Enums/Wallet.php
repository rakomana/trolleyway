<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Pending()
 * @method static Processing()
 * @method static Processed()
 */
final class Wallet extends Enum
{
    const Pending = 'pending';
    const Processed = 'processed';
    const Processing = 'processing';
}
